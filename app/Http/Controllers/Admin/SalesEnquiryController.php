<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\City;
use App\Country;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\SalesEnquiry;
use Illuminate\Http\FileHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesEnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function fetch(Request $request)
    {
        $model = new SalesEnquiry();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }

    public function index()
    {
        return view('admin.salesEnquiry.index');
    }

    public function create()
    {
        $agents = Agent::where(['is_disabled'=>'0'])->get();
        $cities = City::where(['is_disabled'=>'0'])->get();
        $countries = Country::where(['is_disabled'=>0])->get();
        return view('admin.salesEnquiry.create',compact('agents','cities','countries'));
    }

        public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
             'name'=>'required',
             'email'=>'required|email',
             'mobile'=>'required',
             'country_code'=>'required',
             'address'=>'required',
             'category'=>'required',
             'property_type'=>'required',
             'preferred_location'=>'required',
             'bedroom'=>'required',
             'budget'=>'required',
             'agent_id'=>'required',
             'source'=>'required',
         ]);
        $validator->after(function ($validator) use ($request) {

             if(($request->hasFile('passport'))&&(empty($request->passport_exp_date)))
             {
                $validator->errors()->add('passport_expiry_date', 'Passport expiry date field is required!');
             }
             if(($request->hasFile('visa'))&&(empty($request->visa_exp_date)))
             {
                $validator->errors()->add('visa_expiry_date', 'Visa expiry date field is required!');
             }
             if(($request->hasFile('emirates_id_doc'))&&(empty($request->emirates_exp_date)))
             {
                $validator->errors()->add('emirates_exp_date', 'Emirates Id expiry date field is required!');
             }
        });
         if(!$validator->fails())
         {
             $store = $request->only(['name','email','mobile','city_id','country_code','address','category',
                 'property_type','preferred_location','bedroom','budget','agent_id','source']);
             $mobile = $request->mobile;
             $folder = "enquiries/sales/$mobile";
             if($request->hasFile('photo'))
             {
                 $store['photo']  = GlobalHelper::singleFileUpload($request,'local','photo',$folder);
             }
             if($request->hasFile('passport'))
             {
                 $store['passport']  = GlobalHelper::singleFileUpload($request,'local','passport',$folder);
                 $store['passport_exp_date']  = date('Y-m-d',strtotime($request->passport_exp_date));
             }
             if($request->hasFile('visa'))
             {
                 $store['visa']  = GlobalHelper::singleFileUpload($request,'local','visa',$folder);
                 $store['visa_exp_date']  = date('Y-m-d',strtotime($request->visa_exp_date));
             }

              if($request->hasFile('emirates_id'))
             {
                 $store['emirates_id_doc']  = GlobalHelper::singleFileUpload($request,'local','emirates_id_doc',$folder);
                 $store['emirates_exp_date']  = date('Y-m-d',strtotime($request->emirates_exp_date));
             }

              if(!empty($request->source))
             {
                 if($request->source=="website")
                 {
                     $store['website'] = $request->website;
                 }
             }

             if($rentEnquiry = SalesEnquiry::create($store))
             {
                  $result = ['status'=>1,'response' => 'success', 'message' => 'Sales enquiry created successfully'];
             }
             else
             {
               $result = ['status'=>'0','response' => 'error', 'message' => 'Something went wrong,please try again'];
             }
         }
         else
         {
             $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
         }
         return response()->json($result,200);
    }


    public function archive(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "id"=>"required|numeric"
        ]);
        if(!$validator->fails())
        {
            try {
                $enquiry = SalesEnquiry::find($request->id);
                $enquiry->delete();
                $result = ['status'=>1,'response' => 'success', 'message' => 'Sales enquiry sent to archive successfully'];

            }
            catch (\Exception $exception)
            {
                   $result = ['status'=>'0','response' => 'error', 'message' => $exception->getMessage()];
            }

        }
        else
        {
            $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
        }
        return response()->json($result,200);
    }
}
