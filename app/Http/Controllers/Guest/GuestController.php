<?php

namespace App\Http\Controllers\Guest;

use App\State;
use App\Feature;
use App\Slider;
use App\Property;
use App\PropertyType;
use App\PropertyUnitType;
use Illuminate\Http\Request;
use App\Library\PropertyView;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function index(Request $request)
    {

        return view("guest.welcome");
    }

    public function propertyView($propcode,$id)
    {
        $view                        = new PropertyView();
        $model                       = new PropertyUnitType();
        $prop_unit_type              = $model->find($id);
        if($prop_unit_type)
        {
            $property                = Property::where(['propcode' =>$propcode])->first();
            event(new \App\Events\PropertyPageFirstVisited($property));
            $data['features']        = Feature::where('is_disabled', '0')->get();
            $rel_prop_unit_types     = $model->whereNotIn('id',[$id])->whereHas('property',function($query){
                 $query->whereNotNull('propcode');
            })->where(['property_id'=>$property->id])->inRandomOrder()->limit(2)->get();
            $recents                 = $model->whereHas('property',function($query){
                 $query->whereNotNull('propcode');
            })->orderBy('id')->limit(20)->get();
            $data['prop_unit_type']  = $prop_unit_type;
            $data['rel_prop_unit_types'] = $view->execute($rel_prop_unit_types);
            $data['recents']         = $view->execute($recents);
            $propertyTypes    = PropertyType::where('is_disabled', '0')->get();
            $states    = State::withCount('properties')->where('is_disabled', '0')->get();
           return view('guest.property.view',compact('propertyTypes', 'states'))->with($data);
        }
        else
        {
               return redirect()->back()->with('error','Specified property could not be found');
        }

    }
    public function agentListing(Request $request)
    {
        $agents  = \App\Agent::withCount('properties')->paginate(20);
        $view    = new PropertyView();
        $model   = new PropertyUnitType();
        $recents = $model->whereHas('property',function($query){$query->whereNotNull('propcode');})->inRandomOrder()->limit($agents->total())->get();
        $recents = $view->execute($recents);

        return view("guest.agent.list",compact('agents','recents'));
    }
    public function viewAgentDetail($id)
    {
        $agent      = \App\Agent::withCount('properties')->find($id);
        $view       = new PropertyView();
        $model      = new PropertyUnitType();
        $properties = $model->whereHas('property',function($query){$query->whereNotNull('propcode');})->whereHas('propertyUnits',function($query) use($id){
            $query->where(['agent_id'=>$id,'status'=>'1'])->groupBy('property_unit_type_id');
        })->paginate(10);
        $prop_links = $properties->links();
        $properties = $view->execute($properties);
        return view('guest.agent.view',\compact('agent','properties','prop_links'));
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
