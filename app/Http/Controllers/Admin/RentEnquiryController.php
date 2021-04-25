<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\City;
use App\Country;
use App\DataTable\Api;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditRentEnquiry;
use App\Http\Requests\StoreRentEnquiry;
use App\Property;
use App\PropertyUnit;
use App\RentEnquiry;
use App\State;
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
         echo json_encode((new Api((new RentEnquiry())))->getResult());
    }

    public function create()
    {
        $agents = Agent::where(['is_disabled'=>'0'])->get();
        $countries = Country::where(['is_disabled'=>0])->orderBy('name','ASC')->get();
       return view('admin.rentEnquiry.create',compact('agents','countries'));
    }

    public function create_breakdown($id)
    {
        $enquiry = RentEnquiry::find($id);
        if(!empty($enquiry))
        {
            $cities = City::where(['is_disabled' => '0','country_id'=>231])->get();
            $properties = Property::where(['is_disabled' => 0])->get();
            return view("admin.rentEnquiry.breakdown", compact("enquiry","cities", "properties"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Enquiry Detail"]);
        }

    }

     public function edit_breakdown($id)
    {
        $enquiry = RentEnquiry::find($id);
        if((!empty($enquiry))&&(!empty($enquiry->rent_breakdown)))
        {
            $cities = City::where(['is_disabled' => '0','country_id'=>231])->get();
            $prop_params['is_disabled'] = '0';
            if(!empty($enquiry->city_id))
            {
                $prop_params['city_id'] = $enquiry->city_id;
            }
            $properties = Property::where($prop_params)->get();
            $property_units = PropertyUnit::whereIn('unit_status',[1,2,3,4,5]);

            if(!empty($enquiry->property_id))
            {
               $property_units = $property_units->where('property_id',$enquiry->property_id);
            }
            $property_units = $property_units->get();
            return view("admin.rentEnquiry.edit_breakdown", compact("enquiry","cities", "properties","property_units"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Enquiry Detail"]);
        }
    }

    public function store(StoreRentEnquiry $request)
    {
          $request->validated();

             $store = $request->only(['name','email','mobile','country_code','address','category',
                 'property_type','preferred_location','bedroom','budget','tenancy_type','tenant_count','agent_id','source']);

             if($request->hasFile('photo'))
             {
                 $mobile = $request->mobile;
                 $folder = "enquiries/rent/$mobile";
                 $store['photo']  = GlobalHelper::singleFileUpload('public','photo',$folder);
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
                 $next_url = null;
                  if($request->has("next_action"))
                  {
                      if($request->next_action=="create_rent_breakdown")
                      {
                          $next_url = route("rentEnquiry.create.breakdown",["id"=>$rentEnquiry->id]);
                      }
                  }
                  $result = ['status'=>1,'response' => 'success','next_url'=>$next_url, 'message' => 'Rent enquiry created successfully'];
             }
             else
             {
               $result = ['status'=>'0','response' => 'error', 'message' => 'Something went wrong,please try again'];
             }

         return response()->json($result,200);
    }


    public function edit($id)
    {
        $rent_enquiry = RentEnquiry::find($id);
        if(!empty($rent_enquiry))
        {
            $agents = Agent::where(['is_disabled'=>'0'])->get();
            $countries = Country::where('is_disabled', '0')->get();
            return view("admin.rentEnquiry.edit",compact("rent_enquiry","agents","countries"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Rent Enquiry Detail"]);
        }
    }


    public function update(EditRentEnquiry $request)
    {
         $request->validated();
         $update = $request->only(['name','email','mobile','country_code','address','category',
                 'property_type','preferred_location','bedroom','budget','tenancy_type','tenant_count','agent_id','source']);

             if($request->hasFile('photo'))
             {
                 $mobile = $request->mobile;
                 $folder = "enquiries/rent/$mobile";
                 $update['photo']  = GlobalHelper::singleFileUpload('public','photo',$folder);
             }
             if(!empty($request->source))
             {
                 if($request->source=="website")
                 {
                     $update['website'] = $request->website;
                 }
             }
             if(RentEnquiry::where(['id'=>$request->rent_enquiry_id])->update($update))
             {
                 $rentEnquiry = RentEnquiry::find($request->rent_enquiry_id);
                 $next_url = null;
                  if($request->has("next_action"))
                  {
                      if($request->next_action=="create_rent_breakdown")
                      {
                          $next_url = route("rentEnquiry.create.breakdown",["id"=>$rentEnquiry->id]);
                      }
                      if($request->next_action=="edit_rent_breakdown")
                      {
                          $next_url = route("rentEnquiry.edit.breakdown",["id"=>$rentEnquiry->id]);
                      }
                  }
                  $result = ['status'=>1,'response' => 'success','next_url'=>$next_url, 'message' => 'Rent enquiry updated successfully'];
             }
             else
             {
               $result = ['status'=>'0','response' => 'error', 'message' => 'Something went wrong,please try again'];
             }

         return response()->json($result,200);
    }




    public function view($id)
    {
        $rent_enquiry = RentEnquiry::find($id);
        if(!empty($rent_enquiry))
        {
            return view("admin.rentEnquiry.view",compact("rent_enquiry"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Rent Enquiry Detail"]);
        }
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
