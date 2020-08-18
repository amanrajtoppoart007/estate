<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Requests\EditOwner;
use App\Library\CreateAuthorisedPerson;
use App\Library\CreateOwnerAuthPerson;
use App\Library\EditAuthorisedPerson;
use App\Library\EditOwnerAuthPerson;
use App\Library\UploadEntityDocs;
use App\Owner;
use App\OwnerAllotmentHistory;
use App\OwnerDoc;
use App\Property;
use App\PropertyUnit;
use App\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GlobalHelper;
class OwnerController extends Controller
{
    //module specific functions
    public function get_property_units()
    {

        $validator = Validator::make($request->all(), [
            'property_id' => 'numeric|required',
        ]);
        if(!$validator->fails())
        {
            if ($data = PropertyUnit::where(['property_id' => $request->property_id])->get())
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' =>$data, 'message' => 'Property unit found.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Property unit not found.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }

    //end module specific functions

    public function index()
    {
        return view('admin.owner.index');
    }

    public function fetch(Request $request)
    {
        $model = new Owner();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }


    public function create()
    {
        $countries = Country::where(['is_disabled'=>0])->get();
        return view('admin.owner.create',compact("countries"));
    }


    public function store(\App\Http\Requests\StoreOwner $request)
    {
        $request->validated();
        $params   = $request->only(['name','owner_type','firm_type','mobile','email','emirates_id','bank_name','bank_swift_code',
        'bank_account','banking_name','country_id','state_id','city_id','address','country_code']);
        $params['emirates_exp_date'] = date('Y-m-d',strtotime($request->emirates_exp_date));
        $params['passport_exp_date'] = date('Y-m-d',strtotime($request->passport_exp_date));
        $params['visa_exp_date'] = date('Y-m-d',strtotime($request->visa_exp_date));
        $params['poa_exp_date'] = date('Y-m-d',strtotime($request->poa_exp_date));
        if($request->firm_type==='company')
        {
            $company_detail = $request->only(['company_name', 'trade_license', 'telephone_number', 'office_address']);
             $params['license_expiry_date'] = date('Y-m-d',strtotime($request->license_expiry_date));
            $params = array_merge($params , $company_detail);

        }
        $folder = Str::studly(strtolower($request->name));
        if($request->has('photo'))
        {
            $params['photo']    = GlobalHelper::singleFileUpload($request, 'local', 'photo', "owners/$folder");
        }


        $params['admin_id'] = Auth::guard('admin')->user()->id;
        $action = Owner::create($params);
        if($action->id)
        {
            (new CreateAuthorisedPerson($action->id,'owner'))->handle();
            (new UploadEntityDocs($action->id,'owner'))->handle();
            try {

                if ($request->firm_type == 'company') {
                    if ($request->has('vat_number')) {
                        $doc = array();
                        $doc['owner_id'] = $action->id;
                        $doc['doc_url'] = GlobalHelper::singleFileUpload($request, 'local', 'vat_number', "owners/$folder");
                        $doc['doc_type'] = 'vat_number';
                        OwnerDoc::create($doc);

                    }

                    if ($request->has('trade_license')) {
                        $doc = array();
                        $doc['owner_id'] = $action->id;
                        $doc['doc_url'] = GlobalHelper::singleFileUpload($request, 'local', 'trade_license', "owners/$folder");
                        $doc['doc_type'] = 'trade_license';
                        OwnerDoc::create($doc);
                    }

                }
                $next_url = null;
                $next_action = null;
                if($request->has("action"))
                {
                    $_switch = $request->action;
                    switch ($_switch)
                    {
                        case "action_save":
                            $next_action = "save";
                            $next_url    = null;
                            break;
                        case "action_preview":
                            $next_action = "preview";
                            $next_url = route("owner.view",$action->id);
                            break;
                        case "action_allocate_unit":
                            $next_action = "allocate_unit";
                            $next_url    = null;
                            break;
                        default:
                            $next_action = "save";
                            $next_url    = null;
                    }
                }
                $data['owner_id'] = $action->id;
                $result = ['status'=>'1','response'=>'success','data'=>$data,'next_action'=>$next_action,'next_url'=>$next_url,'message'=>'Owner added successfully'];
            }
            catch (\Exception $exception)
            {
                $result = ['status'=>'0','response'=>'error','message'=>$exception->getMessage()];
            }

        }
        else
        {
            $result = ['status'=>'0','response'=>'error','message'=>'Owner creation failed'];
        }
        return response()->json($result,200);
    }


    public function view($id)
    {
        $owner = Owner::find($id);
        if(!empty($owner))
        {
            return view('admin.owner.view',compact('owner'));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Owner Detail"]);
        }

    }


    public function edit($id)
    {

        $owner = Owner::find($id);
        if(!empty($owner))
        {
            $countries = Country::where(['is_disabled'=>0])->get();
            $country_id = $owner->country_id ? $owner->country_id :null;
            if(!empty($country_id))
            {
                $s_params['country_id'] = $country_id;
            }
            $s_params['is_disabled'] = '0';
            $states = State::where($s_params)->get();
            $state_id = $owner->state_id ? $owner->state_id :null;
            if(!empty($state_id))
            {
                $c_params['state_id'] = $state_id;
            }
            $c_params['is_disabled'] = '0';
            $cities = City::where($c_params)->get();
            return view('admin.owner.edit',compact('owner','countries','states','cities'));
        }
        else
        {
            $msg = "Invalid Owner Detail";
            return view("blank",compact("msg"));
        }
    }


    public function update(EditOwner $request,$id)
    {
        $request->validated();
        $data  = $request->only(['name','owner_type','firm_type','mobile','email','emirates_id','bank_name','bank_swift_code','bank_account','banking_name','country_id','state_id','city_id','address','country_code']);

        $folder = Str::studly(strtolower($request->name));
        if($request->hasfile('photo'))
        {
            $data['photo']    = GlobalHelper::singleFileUpload($request,'local','photo',"owners/$folder");
        }

        $data['admin_id'] = Auth::guard('admin')->user()->id;

        if(Owner::where(['id'=>$id])->update($data))
        {
            (new UploadEntityDocs($id,'owner'))->handle();
             (new EditAuthorisedPerson($request->owner_id,'owner'))->handle();
            if($request->firm_type == 'company')
            {
                if($request->has('vat_number'))
                {
                    $doc                = array();
                    $doc['owner_id']    = $id;
                    $doc['doc_url']     = GlobalHelper::singleFileUpload($request, 'local', 'vat_number', "owners/$folder");
                    $doc['doc_type']    = 'vat_number';
                    OwnerDoc::create($doc);

                }

                if($request->has('trade_license'))
                {
                    $doc                  = array();
                    $doc['owner_id']      = $id;
                    $doc['doc_url']       = GlobalHelper::singleFileUpload($request, 'local', 'trade_license', "owners/$folder");
                    $doc['doc_type']      = 'trade_license';
                    OwnerDoc::create($doc);
                }

            }
          return response()->json(['status'=>'1','response'=>'success','message'=>'Owner successfully updated'],200);
        }
        else
        {
            return response()->json(['status'=>'0','response'=>'error','message'=>'Owner updation failed'],200);
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
            if (Owner::where(['id' => $request->id])->update(['is_disabled' => $status]))
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => ['is_disabled' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Status update failed.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function allotment_list(Request $request)
    {
         return view("admin.owner.allocationHistoryList");
    }
    public function fetch_allotment(Request  $request)
    {
         $model  = new OwnerAllotmentHistory();
         $api    = new \App\DataTable\Api($model,$request);
         echo json_encode($api->apply());
    }


    public function init_allotment($owner_id)
    {
         if(!empty($owner_id))
         {
             $properties = Property::whereHas('property_units',function($query){
            $query->whereIn('status',[1,2,3,4,5,6,7,8]);
        })->where(['is_disabled'=>'0'])->get();
                return view("admin.owner.allocate",compact("owner_id","properties"));
         }
         else
         {
            return view("blank")->with(["msg"=>"Invalid Owner Id"]);
         }
    }

    public function allot_unit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'owner_id' => 'numeric|required',
            'property_id' => 'numeric|required',
            'unit_id' => 'numeric|required',
            'purchase_cost' => 'numeric|required',
            'purchase_date' => 'date|required',
        ]);
        if(!$validator->fails())
        {
            $params = $request->only(['owner_id','purchase_cost']);
            if($request->has('purchase_date'))
            {
                $params['purchase_date'] = $request->purchase_date ? date("Y-m-d",strtotime($request->purchase_date)) : null;
            }
            if(PropertyUnit::where(['property_id'=>$request->property_id,'id'=>$request->unit_id])->update($params))
            {
                $params['property_id'] = $request->property_id;
                $params['unit_id']     = $request->unit_id;
                OwnerAllotmentHistory::create($params);
                $data['next_url'] = route("owner.view",$request->owner_id);
                return response()->json(['status'=>1,'response' => 'success', 'data' =>$data , 'message' => 'Unit allotment to owner successful.']);
            }
             else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'Unit allotment failed.']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
