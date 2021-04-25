<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreRentBreakDown extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "tenant_id"=>"unique:rent_break_downs,tenant_id",
            "property_id"=>"required|numeric",
            "unit_id"=>"required|numeric",
            "rent_period_type"=>"required",
            "rent_period"=>"required",
            "parking"=>"required",
            "lease_start"=>"required|date",
            "lease_end"=>"required|date",
            "rent_amount"=>"required|numeric",
            "installments"=>"required|numeric",
            "tenancy_type"=>"required",
            "unit_type"=>"required",
            "security_deposit.*"=>"numeric",
            "municipality_fees.*"=>"numeric",
            "brokerage.*"=>"numeric",
            "contract.*"=>"numeric",
            "remote_deposit.*"=>"numeric",
            "sewa_deposit.*"=>"numeric",
            "monthly_installment.*"=>"numeric",
            "total_monthly_installment.*"=>"numeric",

        ];
        if(request()->has("rent_enquiry_id"))
        {
            $rules["rent_enquiry_id"] = "required|numeric|unique:rent_break_downs,rent_enquiry_id";
        }

        if(request()->parking=="yes")
        {
            $rules['parking_number'] = "required";
        }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $res['status']   = '0';
        $res['response'] = 'validation_error';
        $res['message']  = $validator->errors()->all();
        throw new HttpResponseException(response()->json($res, 200));
    }
}
