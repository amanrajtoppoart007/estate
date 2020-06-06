<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Agent;
use Auth;
use App\Library\CreateAdmin;
class AgentController extends Controller
{

    public function index()
    {
        return view('admin.agent.index');
    }

    public function agentList()
    {
        return view('admin.agent.list');
    }

    public function fetch(Request $request)
    {
        $model = new Agent();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }


    public function create()
    {
        return view('admin.agent.create');
    }
    public function create_company_type_agent()
    {
         $countries  = Country::where('is_disabled', '0')->get();
        return view('admin.agent.create-company',compact('countries'));
    }


    public function store(\App\Http\Requests\StoreAgent $request)
    {
        $request->validated();
        $admin = new \App\Library\CreateAdmin('agent');
        $data   = $request->only(['name','mobile','email','emirates_id','bank_name','bank_ifsc_code','bank_account','banking_name','country','state','city','address']);
        $folder = Str::studly(strtolower($request->name));
        $data['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"agents/$folder");
        $data['admin_id'] = Auth::guard('admin')->user()->id;
        $data['agent_id'] = $admin->execute($request);
        $action = Agent::create($data);
        if($action->id)
        {
            return response()->json(['status'=>'1','response'=>'success','message'=>'Agent successfully created'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Agent creattion failed'],200);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Agent::find($id);
        return view('admin.agent.edit',compact('data'));
    }


    public function update(\App\Http\Requests\EditAgent $request, $id)
    {
        $request->validated();
        $admin = new \App\Library\UpdateAdmin($request->agent_id);
        $admin->execute($request);
        $data  = $request->only(['name','mobile','email','emirates_id','bank_name','bank_ifsc_code','bank_account','banking_name','country','state','city','address']);
        $folder = Str::studly(strtolower($request->name));
        if($request->hasfile('photo'))
        {
            $data['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"agents/$folder");
        }
        $data['admin_id'] = Auth::guard('admin')->user()->id;
        if(Agent::where(['id'=>$id])->update($data))
        {
          return response()->json(['status'=>'1','response'=>'success','message'=>'Agent successfully updated'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Agent updation failed'],200);
        }
    }


    public function destroy($id)
    {
        //
    }
     public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'is_disabled' => 'numeric',
        ]);
        if(!$validator->fails())
        {
            $status = ($request->is_disabled) ? '0' : '1';
            if (Agent::where(['id' => $request->id])->update(['is_disabled' => $status]))
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
