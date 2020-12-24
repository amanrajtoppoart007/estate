<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditRentBreakDown;
use App\Http\Requests\StoreRentBreakDown;
use App\Http\Resources\BankResource;
use App\Library\RentBreakDownLib;
use App\Library\RentEnquiryUser;
use App\Mail\SendRentBreakDownEmail;
use App\Property;
use App\PropertyUnit;
use App\RentBreakDown;
use App\RentEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RentBreakDownController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:admin");
    }

    public function create()
    {
        $query = (new RentEnquiryUser())->get(RentEnquiry::find($id),"tenant");

        if(!empty($query))
        {
             $properties = Property::where(['is_disabled' => 0])->get();
            return view("admin.rentEnquiry.breakdown", compact("query", "properties"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Enquiry Detail"]);
        }
    }

    public function next_action($id)
    {
        $next_url = null;
        if(request()->has("next_action"))
            {
                $action = request()->input('next_action');
                switch ($action)
                {
                    case "create_tenant":
                        $next_url = route("tenant.create",["request_id"=>base64_encode($request->input('rent_enquiry_id'))]);
                        break;
                    case "print_breakdown":
                        $next_url = route('print.rent.breakdown',$id);
                        break;
                    case "send_breakdown_via_email":
                        $next_url = route('send.breakdown.mail',['break_down_id'=>$id,'rent_enquiry_id'=>$request->input('rent_enquiry_id')]);
                        break;
                    case "preview":
                    default:
                         $next_url = route('view.rent.breakdown',$id);
                         break;
                }
            }
        return $next_url;
    }

    public function store(StoreRentBreakDown $request)
    {
         $request->validated();
         if($id = (new RentBreakDownLib())->create('rent_enquiry'))
        {
            $next_url = $this->next_action($id);
            $result = ['status'=>1,'response' => 'success','next_url'=>$next_url, 'message' => 'Rent breakdown created successfully'];
        }
         else
        {
            $result = ['status'=>0,'response' => 'error', 'message' => 'Rent breakdown not created.'];
        }
          return response()->json($result,200);
    }
    public function update(EditRentBreakDown $request)
    {
         $request->validated();
         if($id = (new RentBreakDownLib())->update($request->input('rent_breakdown_id')))
        {
             $next_url = $this->next_action($id);
            $result = ['status'=>1,'response' => 'success','next_url'=>$next_url, 'message' => 'Rent breakdown created successfully'];
        }
         else
        {
            $result = ['status'=>0,'response' => 'error', 'message' => 'Rent breakdown not created.'];
        }
          return response()->json($result,200);
    }

    public function print_breakdown($id)
    {
        $breakdown = RentBreakDown::find($id);
        $breakdown = (new RentBreakDownLib())->view($breakdown);
        if(!empty($breakdown))
        {
            return view("admin.rentBreakDown.print",compact("breakdown"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Detail"]);
        }

    }

    public function view($id)
    {
        $breakdown = RentBreakDown::find($id);
        $breakdown = (new RentBreakDownLib())->view($breakdown);
        if(!empty($breakdown))
        {
            return view("admin.rentBreakDown.view",compact("breakdown"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Detail"]);
        }

    }

    public function edit($id)
    {
         $properties = Property::where(['is_disabled'=>0])->get();
         $breakdown = (new RentBreakDownLib())->view(RentBreakDown::find($id));
         $banks     = BankResource::collection(Bank::where(['status'=>1])->get());
        if(!empty($breakdown))
        {
            $property_units = PropertyUnit::where(['property_id'=>$breakdown['property_id'],'status'=>1])->get();
            return view("admin.rentBreakDown.edit",compact("breakdown","properties","property_units","banks"));
        }
        else
        {
            return view("blank")->with(["msg"=>"Invalid Detail"]);
        }
    }

    public function mail(Request  $request)
    {

        $validator = Validator::make($request->all(),
        [
            "break_down_id"=>"required|numeric",
            "rent_enquiry_id"=>"required|numeric"
        ]);
        if(!$validator->fails())
        {
            try {
                $user      = RentEnquiry::find($request->rent_enquiry_id);
                $breakdown = RentBreakDown::find($request->break_down_id);
                Mail::to($user)->send(new SendRentBreakDownEmail($breakdown));
                $result = ["status"=>1,"response" => "success", "message" => "Mail Sent Successfully"];
            }
            catch (\Exception $exception)
            {
                 $result = ["status"=>0,"response" => "error", "message" => $exception->getMessage()];
            }

        }
        else
        {
            $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
        }
        return response()->json($result,200);
    }

}
