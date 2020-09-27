<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\State;
use App\City;
use App\ContactRequest;
class AjaxController extends Controller
{
    public function check_auth(Request $request)
    {
        if(auth()->check())
        {
            $result = ["status"=>1,"response"=>"success","message"=>"User logged in"];
        }
        else
        {
            $result = ["status"=>0,"response"=>"error","message"=>"User not logged in"];
        }
        return response()->json($result,200);
    }
    public function get_state_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $states = State::where(['country_id' => $request->input('country_id'), 'is_disabled' => '0'])->get();
            if (!$states->isEmpty()) {
                return response()->json(['response' => 'success', 'data' => $states, 'message' => 'States found for selected country.']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'No state Found']);
            }
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }
    public function get_cities_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $cities = City::where(['state_id' => $request->input('state_id'), 'is_disabled' => '0'])->get();
            if (!$cities->isEmpty()) {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $cities, 'message' => 'City list found for selected state.']);
            } else {
                return response()->json(['status'=>'0','response' => 'error', 'message' => 'No city Found']);
            }
        }
        return response()->json(['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()]);
    }
    public function send_contact_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
            'mobile' => 'numeric|required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if (!$validator->fails())
        {

             $contactRequest               = $request->all();
             $contactRequest['created_at'] = date('Y-m-d H:i:s');
             $contactRequest['enquiry_for']= 'property';
            if (ContactRequest::create($contactRequest))
            {
                return response()->json(['response' => 'success', 'data' => $contactRequest, 'message' => 'Contact Request Recieved Successfully,We Will Call You Back Soon,Thank You.']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something Went Wrong ,Please Try Again.']);
            }
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }

}
