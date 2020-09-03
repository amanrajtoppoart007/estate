<?php

namespace App\Http\Controllers\Admin;

use App\PropertyUnitType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PropertyUnitTypeController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $validator = Validator::make($request->all(),['id' => 'required|numeric']);
        if(!$validator->fails())
        {
            $propUnitType = PropertyUnitType::find($request->id);
            if(!empty($propUnitType))
            {
                return response()->json(['status'=>'1','data'=>$propUnitType,'response' => 'success','message' => 'Unit type found']);
            }
            else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' =>'No data found']);
            }
        }
        return response()->json(['status'=>'0','response'=>'error','message' => $validator->errors()->all()]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(),['id' => 'required|numeric']);
        if(!$validator->fails())
        {
            $propUnitType = PropertyUnitType::find($request->id);
            if(!empty($propUnitType))
            {
                if($propUnitType->delete())
                {
                    return response()->json(['status'=>'1','response' => 'success','message' => 'Unit type deleted successfully.']);
                }
                else
                {
                    return response()->json(['status'=>'0','response' => 'error', 'message' =>'Data deletion failed']);
                }

            }
            else
            {
                return response()->json(['status'=>'0','response' => 'error', 'message' =>'No data found']);
            }
        }
        return response()->json(['status'=>'0','response'=>'error','message' => $validator->errors()->all()]);
    }
}
