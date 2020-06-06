<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CalculationController extends Controller
{
    public function getEndDate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rent_period_type' => 'required',
            'rent_period' => 'required|numeric',
            'lease_start' => 'required',
        ]);
        if (!$validator->fails())
        {
           $action = new \App\Library\CalculateEndDate($request->rent_period_type,$request->rent_period,$request->lease_start);
           $endDate = $action->execute();
           if(!empty($endDate))
           {
               $endDate = date('d-m-Y',strtotime($endDate));
               return response()->json(['status'=>1,'response'=>'success','endDate'=>$endDate,'message' =>'Date retrived successfully']);
           }
           return response()->json(['status'=>0,'response'=>'error','message' =>'Action failed']);
        }
        return response()->json(['status'=>0,'response'=>'validation_error','message' => $validator->errors()->all()]);
    }
}
