<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
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

    }

    public function create()
    {
        $agents = Agent::where(['is_disabled'=>'0'])->get();
       return view('admin.rentEnquiry.create',compact('agents'));
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
}
