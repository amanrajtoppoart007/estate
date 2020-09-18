<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Select2Controller extends Controller
{
    //select2
    public function get_cities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "search" => "required",
        ]);
        if (!$validator->fails())
        {
            $search = $request->search;
            $cities = City::where("name","like","%$search%")->where(["is_disabled"=>"0"])->get();
            if(!$cities->isEmpty())
            {
                $data = null;
                $i=0;
                foreach($cities as $city)
                {
                    $data[$i]['id'] = $city->id;
                    $state = $city->state ? $city->state->name : null;
                    $data[$i]['text'] = $city->name ."($state)";
                    $i++;
                }
                return response()->json(['response' => 'success','data'=> $data, 'message' => 'City list found for selected state.']);
            }
            else
            {
                return response()->json(['response' => 'error', 'message' =>'No city Found']);
            }
        }
        return response()->json(['response'=>'error','message' => $validator->errors()->all()]);
    }
}
