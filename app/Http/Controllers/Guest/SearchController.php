<?php

namespace App\Http\Controllers\Guest;



use App\PropertyUnit;
use App\Search\SearchApi;
use Illuminate\Http\Request;
use App\Library\PropertyView;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $propUnitTypes       = array();
        if(!($request->view=='map'))
        {

        }
        $listings   = (new PropertyView())->multiple((new SearchApi(new PropertyUnit()))->getResult());

        switch($request->view)
        {
            case 'grid':
                $view = 'guest.property.grid';
            break;
            case 'map':
                $view = 'guest.property.map';
            break;
            default:
                $view = 'guest.property.list';
            break;
        }
        return view($view,compact("listings"));
    }
    public function map_search_api(Request $request)
    {
        $model           = new \App\PropertyUnitType();
        $search          = new \App\Search\Api($model,$request);
        $propUnitTypes   = $search->apply();
        $view            = new PropertyView();
        $propUnitTypes   = $view->execute($propUnitTypes);
        if(!empty($propUnitTypes['property_unit_types']))
        {
           return response()->json(['status'=>'1','response' => 'success', 'locations' => $propUnitTypes, 'message' => 'Property listing found']);
        }
        else
        {
            return response()->json(['status'=>'0','response' => 'error', 'message' => 'No property found']);
        }
    }
    public function web_api_search(Request $request)
    {
        $propUnitTypes   = (new PropertyView())->execute((new \App\Search\Api((new \App\PropertyUnitType()),$request))->apply());
        if(!empty($propUnitTypes['property_unit_types']))
        {
           return response()->json(['status'=>'1','response' => 'success', 'data' =>$propUnitTypes['property_unit_types'], 'message' => 'Property listing found']);
        }
        else
        {
            return response()->json(['status'=>'0','response' => 'error', 'message' => 'No property found']);
        }
    }
}
