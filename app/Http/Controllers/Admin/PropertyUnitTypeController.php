<?php

namespace App\Http\Controllers\Admin;

use App\PropertyUnitType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PropertyUnitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
