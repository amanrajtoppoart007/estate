<?php

namespace App\Http\Controllers\Admin;
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
        $model = new \App\Employee();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments  = \App\Department::where(['is_disabled'=>'0'])->get();
        $designations = \App\Designation::where(['is_disabled'=>'0'])->get();
        return view('admin.employee.create',\compact('departments','designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreEmployee $request)
    {
        $request->validated();
        $data = $request->only(['name','mobile','email','password','emirates_id','gender','civil_status','age','bank_name','bank_ifsc_code','is_admin',
            'bank_account','banking_name','country','state','city','address','department_id','designation_id','id_number','official_email','status','work_permit_number','iban_number','fixed_salary']);
        $folder               = Str::studly(strtolower($request->name));
        $data['dob']          = date('Y-m-d',strtotime($request->dob));
        $data['joining_date'] = date('Y-m-d',strtotime($request->joining_date));
        if($request->hasfile('photo'))
        {
            $data['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"employees/$folder");
        }
        if($employee = \App\Employee::create($data))
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments  = \App\Department::where(['is_disabled'=>'0'])->get();
        $designations = \App\Designation::where(['is_disabled'=>'0'])->get();
        $employee = \App\Employee::find($id);
        return view('admin.employee.edit',compact('employee','departments','designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdateEmployee $request, $id)
    {
        $request->validated();
        $data = $request->only(['name','mobile','email','password','emirates_id','gender','civil_status','age','bank_name','bank_ifsc_code','is_admin',
            'bank_account','banking_name','country','state','city','address','department_id','designation_id','id_number','official_email','status','work_permit_number','iban_number','fixed_salary']);
        $folder               = Str::studly(strtolower($request->name));
        $data['dob']          = date('Y-m-d',strtotime($request->dob));
        $data['joining_date'] = date('Y-m-d',strtotime($request->joining_date));
        if($request->hasfile('photo'))
        {
            $data['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"employees/$folder");
        }
        if(\App\Employee::where(['id'=>$id])->update($data))
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
            if (\App\Employee::where(['id' => $request->id])->update(['status' => $status])) 
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
