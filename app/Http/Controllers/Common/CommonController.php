<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyUnitResource;
use App\PropertyUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{
    public function get_property_units(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'property_id'=>'numeric|required'
        ]);
        if(!$validator->fails())
        {
            $params = ['property_id'=>$request->property_id];
            $data = PropertyUnitResource::collection(PropertyUnit::where($params)->get());
            if(!$data->isEmpty())
            {
                $result = ['status'=>'1','response' => 'success','data'=>$data, 'message' => 'Data found'];
            }
            else
            {
                $result = ['status'=>'0','response' => 'error', 'message' => 'Data not found'];
            }
        }
        else
        {
           $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
        }
        return response()->json($result,200);
    }

     public function get_vacant_units(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'property_id'=>'numeric|required'
        ]);
        if(!$validator->fails())
        {
            $where = ['property_id'=>$request->property_id];
            $whereIn = [1,3,4,5,6,7,8];
            $data = PropertyUnitResource::collection(PropertyUnit::where($where)->whereIn('unit_status',$whereIn)->get());
            if(!$data->isEmpty())
            {
                $result = ['status'=>'1','response' => 'success','data'=>$data, 'message' => 'Data found'];
            }
            else
            {
                $result = ['status'=>'0','response' => 'error', 'message' => 'Data not found'];
            }
        }
        else
        {
           $result = ['status'=>'0','response' => 'error', 'message' => $validator->errors()->all()];
        }
        return response()->json($result,200);
    }
}
