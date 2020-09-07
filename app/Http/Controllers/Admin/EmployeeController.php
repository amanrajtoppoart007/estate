<?php

namespace App\Http\Controllers\Admin;
use App\City;
use App\Country;
use App\DataTable\Api;
use App\Department;
use App\Designation;
use App\Employee;
use App\Helpers\GlobalHelper;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\State;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use App\Admin;


class EmployeeController extends Controller
{
    public function fetch(Request $request)
    {
        echo json_encode((new Api((new Employee())))->getResult());
    }

    public function index()
    {
        return view('admin.employee.index');
    }


    public function create()
    {
        $countries = Country::where(['is_disabled'=>0])->get();
        $departments  = Department::where(['is_disabled'=>'0'])->get();
        $designations = Designation::where(['is_disabled'=>'0'])->get();
        return view('admin.employee.create',\compact('departments','designations','countries'));
    }


    public function store(StoreEmployee $request)
    {
        $request->validated();
        $data = $request->only(['name','mobile','email','password','emirates_id','gender','civil_status','age','bank_name','bank_ifsc_code','is_admin',
            'bank_account','banking_name','country_id','state_id','city_id','address','department_id','designation_id','id_number','official_email','status','work_permit_number','iban_number','fixed_salary']);
        $folder               = Str::studly(strtolower($request->name));
        $data['dob']          = date('Y-m-d',strtotime($request->dob));
        $data['joining_date'] = date('Y-m-d',strtotime($request->joining_date));
        if($request->hasfile('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload('local','photo',"employees/$folder");
        }
        if($employee = Employee::create($data))
        {
            if($request->is_admin==1)
            {
               $role   = pluck_single_value('designations','designation_id',$request->designation_id,'name');
               $admin  = array('employee_id'=>$employee->id,'name'=>$request->name,'email'=>$request->email,'role'=>$role,'password'=>Hash::make($request->password));
               Admin::create($admin);
            }

          return response()->json(['status'=>'1','response'=>'success','message'=>'Employee addedd successfully'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Something went wrong , please try again!'],200);
        }
    }


    public function view($id)
    {
        $employee = Employee::find($id);
        if(!empty($employee))
        {
            return view("admin.employee.view",compact("employee"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Employee Detail"]);
        }
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        if(!empty($employee))
        {
            $departments = Department::where(['is_disabled' => '0'])->get();
            $designations = Designation::where(['is_disabled' => '0'])->get();
             $countries = Country::where(['is_disabled'=>0])->get();
            $country_id = $employee->country_id ? $employee->country_id :null;
            if(!empty($country_id))
            {
                $s_params['country_id'] = $country_id;
            }
            $s_params['is_disabled'] = '0';
            $states = State::where($s_params)->get();
            $state_id = $employee->state_id ? $employee->state_id :null;
            if(!empty($state_id))
            {
                $c_params['state_id'] = $state_id;
            }
            $c_params['is_disabled'] = '0';
            $cities = City::where($c_params)->get();
            return view('admin.employee.edit', compact('employee', 'departments', 'designations','countries','states','cities'));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Employee Detail"]);
        }

    }


    public function update(UpdateEmployee $request, $id)
    {
        $request->validated();
        $data = $request->only(['name','mobile','email','password','emirates_id','gender','civil_status','age','bank_name','bank_ifsc_code','is_admin',
            'bank_account','banking_name','country_id','state_id','city_id','address','department_id','designation_id','id_number','official_email','status','work_permit_number','iban_number','fixed_salary']);
        $folder               = Str::studly(strtolower($request->name));
        $data['dob']          = date('Y-m-d',strtotime($request->dob));
        $data['joining_date'] = date('Y-m-d',strtotime($request->joining_date));
        if($request->hasfile('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload('local','photo',"employees/$folder");
        }
        if(Employee::where(['id'=>$id])->update($data))
        {
            if($request->is_admin==1)
            {
               $role   = pluck_single_value('designations','designation_id',$request->designation_id,'name');
               $admin  = array('employee_id'=>$id,'name'=>$request->name,'email'=>$request->email,'role'=>$role,'password'=>Hash::make($request->password));
               Admin::where(['employee_id'=>$id])->update($admin);
            }

          return response()->json(['status'=>'1','response'=>'success','message'=>'Employee updated successfully'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Something went wrong , please try again!'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'status' => 'numeric',
        ]);
        if(!$validator->fails())
        {
            $status = ($request->status) ? '0' : '1';
            if (Employee::where(['id' => $request->id])->update(['status' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['status' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status updation failed.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
