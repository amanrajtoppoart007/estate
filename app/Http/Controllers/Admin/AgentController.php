<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Agent;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GlobalHelper;
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
        $countries  = Country::where('is_disabled', '0')->get();
        return view('admin.agent.create',compact('countries'));
    }
    public function create_company_type_agent()
    {
         $countries  = Country::where('is_disabled', '0')->get();
        return view('admin.agent.create-company',compact('countries'));
    }


    public function store(\App\Http\Requests\StoreAgent $request)
    {
        $request->validated();
        $store   = $request->only(['agent_type','name','country_code','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country_id','state_id','city_id','address']);
        $folder = Str::studly(strtolower($request->name));
        if($request->agent_type=='company')
        {
            $company = $request->only(['owner_name','owner_email','owner_mobile']);
            $store   = array_merge($store,$company);
            $store['owner_photo']    = GlobalHelper::singleFileUpload($request,'local','owner_photo',"agents/$folder");
            $store['trade_license']  = GlobalHelper::singleFileUpload($request,'local','trade_license',"agents/$folder");
            $store['vat_number']     = GlobalHelper::singleFileUpload($request,'local','vat_number',"agents/$folder");
        }

        $store['photo']    = GlobalHelper::singleFileUpload($request,'local','photo',"agents/$folder");

        if($request->hasFile('emirates_id_doc'))
        {
            $store['emirates_id_doc']    = GlobalHelper::singleFileUpload($request,'local','emirates_id_doc',"agents/$folder");

            $store['emirates_exp_date']  = date('Y-m-d',strtotime($request->emirates_exp_date));
        }

         if($request->hasFile('passport'))
         {
              $store['passport']    = GlobalHelper::singleFileUpload($request,'local','passport',"agents/$folder");
              $store['passport_exp_date']  = date('Y-m-d',strtotime($request->passport_exp_date));
         }

         if($request->hasFile('visa'))
         {
             $store['visa']    = GlobalHelper::singleFileUpload($request,'local','visa',"agents/$folder");
             $store['visa_exp_date']  = date('Y-m-d',strtotime($request->visa_exp_date));
         }

        $store['admin_id'] = Auth::guard('admin')->user()->id;
        if($agent = Agent::create($store))
        {
            $data['next_route'] = route("agent.view",$agent->id);
            return response()->json(['status'=>1,'response'=>'success','data'=>$data,'message'=>'Agent successfully created'],200);
        }
        else
        {
            return response()->json(['status'=>0,'response'=>'error','message'=>'Agent creation failed'],200);
        }
    }


    public function view($id)
    {
        $agent = Agent::find($id);
        if($agent->agent_type=="individual")
        {
            $view = "admin.agent.view";
        }
        else
        {
            $view = "admin.agent.view-company";
        }

        return view($view,compact("agent"));
    }


    public function edit($id)
    {
        $agent = Agent::find($id);
        if(!empty($agent))
        {

            $country_id = $agent->country_id ? $agent->country_id :null;
            if(!empty($country_id))
            {
                $s_params['country_id'] = $country_id;
            }
            $s_params['is_disabled'] = '0';
            $states = State::where($s_params)->get();
            $state_id = $agent->state_id ? $agent->state_id :null;
            if(!empty($state_id))
            {
                $c_params['state_id'] = $state_id;
            }
            $c_params['is_disabled'] = '0';
            $cities = City::where($c_params)->get();

            $view = 'admin.agent.edit';
            if ($agent->agent_type == 'company') {
                $view = 'admin.agent.edit-company';
            }
            $countries = Country::where('is_disabled', '0')->get();
            return view($view, compact('agent', 'countries','states','cities'));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Agent Detail"]);
        }

    }




    public function update(\App\Http\Requests\EditAgent $request, $id)
    {
        $request->validated();

        $update  = $request->only(['agent_type','name','country_code','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country_id','state_id','city_id','address']);
        $folder = Str::studly(strtolower($request->name));
        if($request->hasfile('photo'))
        {
            $update['photo']    = \App\Helpers\GlobalHelper::singleFileUpload($request,'local','photo',"agents/$folder");
        }
         if($request->agent_type=='company')
        {
            $company = $request->only(['owner_name','owner_email','owner_mobile']);
            $update   = array_merge($update,$company);
            if($request->hasFile('owner_photo'))
            {
                $update['owner_photo']    = GlobalHelper::singleFileUpload($request,'local','owner_photo',"agents/$folder");
            }

            if($request->hasFile('trade_license'))
            {
                $update['trade_license']  = GlobalHelper::singleFileUpload($request,'local','trade_license',"agents/$folder");
            }

            if($request->hasFile('vat_number'))
            {
                 $update['vat_number']     = GlobalHelper::singleFileUpload($request,'local','vat_number',"agents/$folder");
            }
        }


        if($request->hasFile('emirates_id_doc'))
        {
            $update['emirates_id_doc']    = GlobalHelper::singleFileUpload($request,'local','emirates_id_doc',"agents/$folder");

            $update['emirates_exp_date']  = date('Y-m-d',strtotime($request->emirates_exp_date));
        }

         if($request->hasFile('passport'))
         {
              $update['passport']    = GlobalHelper::singleFileUpload($request,'local','passport',"agents/$folder");
              $update['passport_exp_date']  = date('Y-m-d',strtotime($request->passport_exp_date));
         }

         if($request->hasFile('visa'))
         {
             $update['visa']    = GlobalHelper::singleFileUpload($request,'local','visa',"agents/$folder");
             $update['visa_exp_date']  = date('Y-m-d',strtotime($request->visa_exp_date));
         }
          $update['admin_id'] = Auth::guard('admin')->user()->id;
        if(Agent::where(['id'=>$id])->update($update))
        {
          return response()->json(['status'=>1,'response'=>'success','message'=>'Agent successfully updated'],200);
        }
        else
        {
            return response()->json(['status'=>0,'response'=>'error','message'=>'Agent updation failed'],200);
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
            $status = ($request->is_disabled) ? '0' : 1;
            if (Agent::where(['id' => $request->id])->update(['is_disabled' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['is_disabled' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Status not updated.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
