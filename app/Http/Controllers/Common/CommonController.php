<?php

namespace App\Http\Controllers\Common;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\PropertyUnitResource;
use App\PropertyUnit;
use App\RentBreakDownSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{

    public function get_breakdown_constants(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "tenancy_type"=>"required",
            "unit_type"=>"required"
        ]);
        if(!$validator->fails())
        {
             $setting = RentBreakDownSetting::where(["tenancy_type"=>$request->tenancy_type,"unit_type"=>$request->unit_type])->first();

             if(!empty($setting))
             {
                 $result = ['status'=>'1','response' => 'success','data'=>$setting, 'message' => 'Data found'];
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

    public function get_country_city_list(CountryRequest $request)
    {
        $request->validated();
        $cities = City::where(['country_id'=>$request->country_id])->get();
        if(!$cities->isEmpty())
        {
            $result = ["status"=>1,"response"=>"success","data"=>$cities,"message"=>"Data found"];
        }
        else
        {
            $result = ["status"=>0,"response"=>"error","message"=>"Data not found"];
        }
        return response()->json($result,200);
    }
}
