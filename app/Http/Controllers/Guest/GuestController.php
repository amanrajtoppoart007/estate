<?php

namespace App\Http\Controllers\Guest;

use App\Agent;
use App\PropertyUnit;
use Illuminate\Http\Request;
use App\Library\PropertyView;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function index(Request $request)
    {

        return view("guest.welcome");
    }

    public function propertyView($unit_code)
    {
        $unitObject    = PropertyUnit::where('unitcode',$unit_code)->first();
        $unit          = (new PropertyView())->single($unitObject);
        if(!empty($unit))
        {
            event(new \App\Events\PropertyPageFirstVisited($unitObject->property));
            return view('guest.property.view',compact('unit'));
        }
        else
        {
               return redirect()->back()->with('error','Specified property could not be found');
        }

    }
    public function agentListing(Request $request)
    {
        $agents  = Agent::withCount('properties')->paginate(20);

        return view("guest.agent.list",compact('agents'));
    }
    public function viewAgentDetail($id)
    {
        $agent      = Agent::withCount('properties')->find($id);
        $properties = (new PropertyView())->multiple($agent->property_units);
        return view('guest.agent.view',\compact('agent','properties'));
    }

    public function buy()
    {
        return view("guest.buy");
    }
    public function contact()
    {
        return view('guest.contact');
    }
    public function faq()
    {
        return view('guest.faq');
    }
    public function about()
    {
        return view('guest.about');
    }
    public function terms()
    {
        return view('guest.terms');
    }
    public function how_it_work()
    {
        return view('guest.how_it_work');
    }
}
