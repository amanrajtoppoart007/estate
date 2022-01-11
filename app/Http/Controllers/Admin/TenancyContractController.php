<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\TenancyContractLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenancyContractController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(),[
            "unit_id"=>"required",
            "tenant_id"=>"required",
            "unit_allotment_id"=>"required",
            "breakdown_id"=>"required",
            "effective_from"=>"required|date",
            "effective_upto"=>"required|date",
            "tenancy_contract"=>"required"
        ]);
        if(!$validator->fails())
        {
            if((new TenancyContractLib())->store())
            {
                $result = ["status"=>1,"response"=>"success","message"=>"contract uploaded"];
            }
            else
            {
                   $result = ["status"=>0,"response"=>"error","message"=>"contract not uploaded"];
            }
        }
        else
        {
            $result = ["status"=>0,"response"=>"validation_errors","message"=>$validator->errors()->all()];
        }
        return response()->json($result,200);
    }
}
