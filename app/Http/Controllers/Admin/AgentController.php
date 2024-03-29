<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\DataTable\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditAgent;
use App\Http\Requests\StoreAgent;
use App\Library\CreateAuthorisedPerson;
use App\Library\EditAuthorisedPerson;
use App\Library\UploadEntityDocs;
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
        echo json_encode((new Api(new Agent()))->getResult());
    }


    public function create()
    {
        $countries  = Country::where('is_disabled', '0')->orderBy('name','ASC')->get();
        return view('admin.agent.create',compact('countries'));
    }

    public function store(StoreAgent $request)
    {
        $request->validated();
        $store   = $request->only(['agent_type','name','country_code','owner_country_code','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country_id','state_id','city_id','address']);
        $folder = Str::studly(strtolower($request->name));
        if($request->has("license_expiry_date"))
        {
            $store['license_expiry_date'] = date("Y-m-d",strtotime($request->license_expiry_date));
        }
        if($request->agent_type=='company')
        {
            $company = $request->only(['owner_name','owner_email','owner_mobile']);
            $store   = array_merge($store,$company);
            $store['owner_photo']    = GlobalHelper::singleFileUpload('local','owner_photo',"agents/$folder");
            $store['trade_license']  = GlobalHelper::singleFileUpload('local','trade_license',"agents/$folder");
            $store['vat_number']     = GlobalHelper::singleFileUpload('local','vat_number',"agents/$folder");
        }
        if($request->hasFile("photo"))
        {
            $store['photo']    = GlobalHelper::singleFileUpload('local','photo',"agents/$folder");
        }
        $store['admin_id'] = Auth::guard('admin')->user()->id;
        if($agent = Agent::create($store))
        {
            (new UploadEntityDocs($agent->id,'agent'))->handle();
            (new CreateAuthorisedPerson($agent->id,'agent'))->handle();
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
        if(!empty($agent))
        {
          return view("admin.agent.view",compact("agent"));
        }
        else
        {
           $msg = "Invalid Agent Detail";
            return view("blank",compact("msg"));
        }
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

            $countries = get_countries();
            return view("admin.agent.edit", compact('agent', 'countries','states','cities'));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Agent Detail"]);
        }

    }




    public function update(EditAgent $request, $id)
    {
        $request->validated();

        $update  = $request->only(['agent_type','name','country_code','owner_country_code','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country_id','state_id','city_id','address']);
        $folder = Str::studly(strtolower($request->name));
        if($request->hasfile('photo'))
        {
            $update['photo']    = \App\Helpers\GlobalHelper::singleFileUpload('local','photo',"agents/$folder");
        }
         if($request->agent_type=='company')
        {
            $company = $request->only(['owner_name','owner_email','owner_mobile']);
            $update   = array_merge($update,$company);
            if($request->hasFile('owner_photo'))
            {
                $update['owner_photo']    = GlobalHelper::singleFileUpload('local','owner_photo',"agents/$folder");
            }

            if($request->hasFile('trade_license'))
            {
                $update['trade_license']  = GlobalHelper::singleFileUpload('local','trade_license',"agents/$folder");
            }

            if($request->hasFile('vat_number'))
            {
                 $update['vat_number']     = GlobalHelper::singleFileUpload('local','vat_number',"agents/$folder");
            }

        }

         if($request->has("license_expiry_date"))
         {
            $update['license_expiry_date'] = date("Y-m-d",strtotime($request->license_expiry_date));
         }


          $update['admin_id'] = Auth::guard('admin')->user()->id;
        if(Agent::where(['id'=>$id])->update($update))
        {
             (new UploadEntityDocs($id,'agent'))->handle();
            (new EditAuthorisedPerson($id,'agent'))->handle();
           return response()->json(['status'=>1,'response'=>'success','message'=>'Agent successfully updated'],200);
        }
        else
        {
            return response()->json(['status'=>0,'response'=>'error','message'=>'Agent not updated'],200);
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
