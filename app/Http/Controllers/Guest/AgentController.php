<?php

namespace App\Http\Controllers\Guest;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Library\PropertyView;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function search(Request $request)
    {
        $agents  = Agent::withCount('properties')->paginate(20);
        return view("guest.agent.list",compact('agents'));
    }

    public function view($id)
    {
        $agent      = Agent::withCount('properties')->find($id);
        $properties = (new PropertyView())->multiple($agent->property_units);
        return view('guest.agent.view',\compact('agent','properties'));
    }

}
