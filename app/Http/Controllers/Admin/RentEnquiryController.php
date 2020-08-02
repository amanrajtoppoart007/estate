<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Country;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\RentEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentEnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       return view('admin.rentEnquiry.index');
    }

     public function fetch(Request $request)
    {
        $model = new RentEnquiry();
        $api    = new \App\DataTable\Api($model,$request);
        echo json_encode($api->apply());
    }

    public function create()
    {
        $agents = Agent::where(['is_disabled'=>'0'])->get();
        $countries = Country::where('is_disabled', '0')->get();
       return view('admin.rentEnquiry.create',compact('agents','countries'));
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
             'tenancy_type'=>'required',
             'tenant_count'=>'required',
             'agent_id'=>'required',
             'source'=>'required'
         ]);
         if(!$validator->fails())
         {
             $store = $request->only(['name','email','mobile','country_code','address','category',
                 'property_type','preferred_location','bedroom','budget','tenancy_type','tenant_count','agent_id','source']);

             if($request->hasFile('photo'))
             {
                 $mobile = $request->mobile;
                 $folder = "enquiries/rent/$mobile";
                 $store['photo']  = GlobalHelper::singleFileUpload($request,'local','photo',$folder);
             }
             if(!empty($request->source))
             {
                 if($request->source=="website")
                 {
                     $store['website'] = $request->website;
                 }
             }
             if($rentEnquiry = RentEnquiry::create($store))
             {
                  $result = ['status'=>1,'response' => 'success', 'message' => 'Rent enquiry created successfully'];
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
                $enquiry = RentEnquiry::find($request->id);
                $enquiry->delete();
                $result = ['status'=>1,'response' => 'success', 'message' => 'Rent enquiry sent to archive successfully'];

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
