<?php

namespace App\Http\Controllers\Admin;
use App\City;
use App\Country;
use App\Employee;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use App\Admin;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function fetch(Request $request)
    {
        $model = new Employee();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $countries = Country::where(['is_disabled'=>0])->get();
        $departments  = \App\Department::where(['is_disabled'=>'0'])->get();
        $designations = \App\Designation::where(['is_disabled'=>'0'])->get();
        return view('admin.employee.create',\compact('departments','designations','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployee $request
     * @return JsonResponse
     */
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
            $data['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"employees/$folder");
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

    /**
     * @param $id
     * @return Application|Factory|View
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        if(!empty($employee))
        {
            $departments = \App\Department::where(['is_disabled' => '0'])->get();
            $designations = \App\Designation::where(['is_disabled' => '0'])->get();
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

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployee $request
     * @param int $id
     * @return JsonResponse
     */
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
            $data['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"employees/$folder");
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
