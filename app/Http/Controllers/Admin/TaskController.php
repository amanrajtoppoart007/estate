<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\Department;
use App\TaskAssignment;
use App\Library\Comments;
use App\TaskList;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function fetch(Request $request)
    {
        $model  = new Task();
        $api    = new  \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }

    public function get_chat_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'numeric|required',
        ]);
        if(!$validator->fails())
        {
            $action = new Comments($request->task_id,Auth::guard('admin')->user()->id);
            $data   = $action->handle();
            if(!empty($data))
            {
                 return response()->json(['status'=>1,'response' => 'success', 'data' => $data, 'message' => 'Messages retrieved']);
            }
            return response()->json(['status'=>0,'response' => 'error', 'message' => 'No chat found']);
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
    public function store_chat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'numeric|required',
            'msg' => 'required',
            'media' => 'mimes:jpeg,png,jpg,gif,svg,pdf,csv,xlsx|max:2048',
        ]);
        if(!$validator->fails())
        {
            $chat              = $request->only(['task_id','msg']);
            $chat['date']      = $folder = date('Y-m-d');
            $chat['user_id']   = Auth::guard('admin')->user()->id;
            $chat['user_type'] = pluck_single_value('admins','id',$chat['user_id'],'role');
            $chat['media']     = GlobalHelper::singleFileUpload($request,'local','media',"task/chat/$folder");
            if(\App\TaskComment::create($chat))
            {
                return response()->json(['status'=>1,'response' => 'success','message' => 'Messages created successfully']);
            }
            return response()->json(['status'=>0,'response' => 'success','message' => 'Messages creation failed']);
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }

     public function generate_task_code(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'property_unit_id' => 'numeric|required',
        ]);
        if(!$validator->fails())
        {
            $gen_action = new \App\Library\GenerateTaskCode($request->all());
            $task_code  = $gen_action->execute();
            if($task_code)
            {
               return response()->json(['status'=>1,'response' => 'success', 'task_code' => $task_code, 'message' => 'Task code generated successfully']);
            }
            else
            {
               return response()->json(['status'=>0,'response' => 'error', 'message' => 'Task code generation failed']);
            }

        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function index()
    {
        $data = array();

        return view('admin.task.index')->with($data);
    }


    public function create(Request $request)
    {
        $data                = array();
        $data['states']      = \App\State::where(['is_disabled'=>'0'])->get();
        $data['departments'] = Department::where('is_disabled','0')->orderBy('name')->get();
        $data['designations'] = \App\Designation::where('is_disabled','0')->orderBy('name')->get();
        return view('admin.task.create')->with($data);
    }


    public function get_user_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'numeric|required',
            'designation_id' => 'numeric|required'
        ]);
        if(!$validator->fails())
        {
            if($employees = \App\Employee::where(['department_id' => $request->department_id,'designation_id' => $request->designation_id,'status'=>'1'])->orderBy('name')->get())
            {
                foreach($employees as $employee)
                {
                    $employee_id[] = $employee->id;
                }
                if(!empty($employee_id))
                {
                    if($data = \App\Admin::whereIn('employee_id',$employee_id)->get())
                    {
                      return response()->json(['status'=>1,'response' => 'success', 'data' => $data, 'message' => 'Data Found.']);
                    }
                }
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'No User found.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'No User found.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function get_city_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'numeric|required'
        ]);
        if(!$validator->fails())
        {
            if($data = \App\City::where(['state_id' => $request->state_id,'is_disabled'=>'0'])->get())
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $data, 'message' => 'Data Found.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'No city found.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function get_property_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'numeric|required'
        ]);
        if(!$validator->fails())
        {
            if($data = \App\Property::where(['city_id' => $request->city_id,'is_disabled'=>'0'])->get())
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $data, 'message' => 'Data Found.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'No Property found.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function get_property_unit_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => 'numeric|required'
        ]);
        if(!$validator->fails())
        {
            if($data = \App\PropertyUnit::where(['property_id' => $request->property_id,'status'=>'1'])->get())
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $data, 'message' => 'Data Found.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'No Property Unit found.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }

    /*
     * get the list of available task department wise ***
     * @param Request $request
     */

    public function get_task_list(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'department_id' => 'numeric|required'
        ]);
       if(!$validator->fails())
       {
           $data = TaskList::where(['department_id'=>$request->department_id,'status'=>1])->get();
           if(!$data->isEmpty())
           {
               $result = ['status'=>1,'response' => 'success', 'data' => $data, 'message' => 'Data Found.'];
           }
           else
           {
               $result = ['status'=>'0','response' => 'error', 'message' => 'No Property Unit found.'];
           }
       }
       else
       {
           $result =['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
       }
       return response()->json($result,200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_code'  => 'required|unique:tasks,task_code',
            'task_title'  => 'required',
            'deadline'  => 'date|required',
            'description'  => 'required',
            'designation_id'  => 'required|numeric',
            'priority'  => 'required|numeric',
            'property_id'  => 'required|numeric',
            'property_unit_id'  => 'required|numeric',
            'assignee_id'  => 'required|numeric',

        ]);
        if(!$validator->fails())
        {
            $task                  = $request->only(['task_title','description','property_id','property_unit_id','priority']);
            $gen_action            = new \App\Library\GenerateTaskCode($request->all());
            $task['task_code']     = $gen_action->execute();
            $task['assignor_id']   = Auth::guard('admin')->user()->id;
            $task['assignor_type'] = Auth::guard('admin')->user()->role;
            $role                  = \App\Designation::where(['id' => $request->designation_id])->pluck('name');
            $role                  = ($role) ? Str::snake(strtolower($role[0])) : null;
            $task['assignee_id']   = $request->assignee_id;
            $task['assignee_type'] = $role;
            $task['status']        = 0;
            $task['deadline']      = date('Y-m-d',strtotime($request->deadline));
            if($task=Task::create($task))
            {
                $task_assign['task_id']       = $task->id;
                $task_assign['assignee_id']   = $request->assignee_id;
                $task_assign['assignee_type'] = $role;
                $task_assign['assignor_id']   = Auth::guard('admin')->user()->id;
                $task_assign['assignor_type'] = Auth::guard('admin')->user()->role;
                $task_assign['status']        = 'ASSIGNED';
                TaskAssignment::create($task_assign);
                return response()->json(['status'=>1,'response' => 'success',  'message' => 'Task created successfully']);
            }
            else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Task Assignment failed']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function show($id)
    {
        $task   = Task::find($id);
        return view('admin.task.view',compact('task'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'task_id'  => 'required|numeric',
            'task_title'  => 'required',
            'deadline'  => 'date|required',
            'description'  => 'required',
            'designation_id'  => 'required|numeric',
            'priority'  => 'required|numeric',
            'property_id'  => 'required|numeric',
            'property_unit_id'  => 'required|numeric',
            'assignee_id'  => 'required|numeric',

        ]);
        if(!$validator->fails())
        {
            $task                  = $request->only(['task_code','task_title','description','property_id','property_unit_id','priority']);
            $task['assignor_id']   = Auth::guard('admin')->user()->id;
            $task['assignor_type'] = Auth::guard('admin')->user()->role;
            $task['deadline']      = date('Y-m-d',strtotime($request->deadline));
            $task['status']        = 0;
            if($task=Task::create($task))
            {
                $role   = \App\Designation::where(['id'=>$request->designation_id])->pluck('name');
                $role   = ($role)?Str::snake(strtolower($role[0])):null;
                $task_assign['task_id']       = $task->id;
                $task_assign['assignee_id']   = $request->assignee_id;
                $task_assign['assignee_type'] = $role;
                $task_assign['assignor_id']   = Auth::guard('admin')->user()->id;
                $task_assign['assignor_type'] = Auth::guard('admin')->user()->role;
                $task_assign['status']        = 'ASSIGNED';
                TaskAssignment::create($task_assign);
                return response()->json(['status'=>1,'response' => 'success',  'message' => 'Task created successfully']);
            }
            else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Task Assignment failed']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function taskStatusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'task_id'=>'numeric|required',
            'priority'=>'numeric|required',
        ]);
        if(!$validator->fails())
        {
            $update = $request->only(['status','priority']);
            if(Task::where(['id'=>$request->task_id])->update($update))
            {
               $result = ['status'=>'1','response' => 'success', 'message' => 'Task updated'];
            }
            else
            {
                $result = ['status'=>'0','response' => 'error', 'message' => 'Task not updated'];
            }
        }
        else
        {
           $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
        }

        return response()->json($result,200);
    }




}
