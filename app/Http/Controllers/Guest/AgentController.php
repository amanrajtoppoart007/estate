<?php

namespace App\Http\Controllers\Guest;

use App\Agent;
use App\ContactRequest;
use App\Http\Controllers\Controller;
use App\Library\PropertyView;
use App\Search\SearchApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function search(Request $request)
    {
        $agents = (new SearchApi(new Agent()))->getResult();
        return view("guest.agent.list",compact('agents'));
    }

    public function view($id)
    {
        $agent      = Agent::withCount('properties')->find($id);
        $properties = (new PropertyView())->multiple($agent->property_units);
        return view('guest.agent.view',\compact('agent','properties'));
    }

    public function store_enquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
            'mobile' => 'numeric|required',
            'country_code' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if (!$validator->fails())
        {

             $input                = $request->only(['name','email','country_code','mobile','subject','message']);
             $input['enquiry_for'] = 'agent';
            if (ContactRequest::create($input))
            {
                return response()->json(['response' => 'success', 'data' => $input, 'message' => 'Enquiry request received successfully,we will call you back soon,Thank you.']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something Went Wrong ,Please Try Again.']);
            }
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }

}
