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
            "property_id"=>"required|numeric",
            "unit_id"=>"required|numeric",
            "rent_frequency"=>"required",
            "rent_period"=>"required",
            "parking"=>"required",
            "lease_start_date"=>"required|date",
            "lease_end_date"=>"required|date",
            "rent_amount"=>"required|numeric",
            "installments"=>"required|numeric",
            "tenancy_type"=>"required",
            "unit_type"=>"required",
            "security_deposit"=>"required|numeric",
            "municipality_fees"=>"required|numeric",
            "brokerage"=>"required|numeric",
            "contract"=>"required|numeric",
            "remote_deposit"=>"required|numeric",
            "sewa_deposit"=>"required|numeric",
            "first_installment"=>"required|numeric",
            "total_first_installment"=>"required|numeric",

        ];
        if(request()->has("rent_enquiry_id"))
        {
            $rules["rent_enquiry_id"] = "required|numeric|unique:rent_break_downs,rent_enquiry_id";
        }
        if(request()->has("tenant_id"))
        {
            $rules["tenant_id"] = "nullable|numeric|unique:rent_break_downs,tenant_id";
        }

        if(request()->parking=="yes")
        {
            $rules['parking_number'] = "required";
        }
        return $rules;
    }

    public function messages()
    {
        return [
            "tenant_id.unique"=>"A flat is already assigned to tenant",
            "rent_enquiry_id.unique"=>"A breakdown is already created for the tenant"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res['status']   = '0';
        $res['response'] = 'validation_error';
        $res['message']  = $validator->errors()->all();
        throw new HttpResponseException(response()->json($res, 200));
    }
}
