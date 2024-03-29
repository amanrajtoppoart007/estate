<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditRentBreakDown;
use App\Http\Requests\StoreRentBreakDown;
use App\Library\CreateRentBreakDown;
use App\Library\UpdateRentBreakDown;
use App\Mail\SendRentBreakDownEmail;
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

    public function store(StoreRentBreakDown $request)
    {
         $request->validated();
         if($id = (new CreateRentBreakDown())->handle())
        {
            $next_url = null;
            if($request->has("next_action"))
            {
                $action = $request->next_action;
                switch ($action)
                {
                    case "create_tenant":
                        $next_url = route("tenant.create",["request_id"=>base64_encode($request->rent_enquiry_id)]);
                        break;
                    case "print_breakdown":
                        $next_url = route('print.rent.breakdown',$id);
                        break;
                    case "send_breakdown_via_email":
                        $next_url = route('send.breakdown.mail',['break_down_id'=>$id,'rent_enquiry_id'=>$request->rent_enquiry_id]);
                        break;
                    case "preview":
                    default:
                         $next_url = route('view.rent.breakdown',$id);
                         break;
                }
            }

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
         if($id = (new UpdateRentBreakDown($request->rent_breakdown_id))->handle())
        {
            $next_url = null;
            if($request->has("next_action"))
            {
                $action = $request->next_action;
                switch ($action)
                {
                    case "create_tenant":
                        $next_url = route("tenant.create",["request_id"=>base64_encode($request->rent_enquiry_id)]);
                        break;
                    case "print_breakdown":
                        $next_url = route('print.rent.breakdown',$id);
                        break;
                    case "send_breakdown_via_email":
                        $next_url = route('send.breakdown.mail',['break_down_id'=>$id,'rent_enquiry_id'=>$request->rent_enquiry_id]);
                        break;
                    case "preview":
                    default:
                         $next_url = route('view.rent.breakdown',$id);
                         break;
                }
            }

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
         $breakdown = RentBreakDown::find($id);
        if(!empty($breakdown))
        {
            return view("admin.rentBreakDown.edit",compact("breakdown"));
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
