<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Department;
class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function fetch(Request $request)
    {
        $model  = new Department();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }
    public function index(){
        $departments = Department::orderBy('created_at','desc')->paginate(10);
        return view('admin.department.index')->with('departments',$departments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if (!$validator->fails())
        {
            $department                = $request->all();
            $department['admin_id']    = Auth::guard('admin')->user()->id;
            $department['is_disabled'] = '0';
            $department['created_at']  = date('Y-m-d H:i:s');
            $insert                 = Department::create($department);
            if($insert->id)
            {
                $department = Department::find($insert->id);
                return response()->json(['status'=>1,'response' => 'success', 'data' => $department, 'message' => 'Department added successfully.']);
            }
             else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Department addition failed']);
            }
        }
        else
        {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if(!$validator->fails())
        {
            $department = Department::find($request->input('id'));
            if ($department)
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $department, 'message' => 'Department found.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Specified Department not found']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
        ]);
        if (!$validator->fails()) {
            $department             = Department::find($request->input('id'));
            $department->name       = $request->input('name');
            $department->updated_at = date('Y-m-d H:i:s');
            if ($department->save())
            {
                $department             = Department::find($request->input('id'));
                return response()->json(['status'=>1,'response' => 'success', 'data' => $department,  'message' => 'Department updated successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Department updation failed']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails())
        {
            if (Department::destroy($request->input('id')))
            {
                return response()->json(['status'=>1,'response' => 'success', 'message' => 'Department deleted successfully.']);
            }
            else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Department deletion failed.']);
            }
        }
         else
        {
            return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }



     public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'is_disabled' => 'numeric',
        ]);
        if (!$validator->fails()) {
            $status = ($request->is_disabled) ? '0' : '1';
            if (Department::where(['id' => $request->id])->update(['is_disabled' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['is_disabled' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status updation failed.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
