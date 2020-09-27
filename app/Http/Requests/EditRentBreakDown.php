<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class EditRentBreakDown extends FormRequest
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
            "rent_breakdown_id"=>"required|numeric",
            "property_id"=>"required|numeric",
            "unit_id"=>"required|numeric",
            "rent_period_type"=>"required",
            "rent_period"=>"required",
            "parking"=>"required",
            "lease_start"=>"required|date",
            "lease_end"=>"required|date",
            "rent_amount"=>"required|numeric",
            "installments"=>"required|numeric",
            //"unit_type"=>"required",
            "security_deposit.*"=>"numeric",
            "municipality_fees.*"=>"numeric",
            "brokerage.*"=>"numeric",
            "contract.*"=>"numeric",
            "remote_deposit.*"=>"numeric",
            "sewa_deposit.*"=>"numeric",
            "monthly_installment.*"=>"numeric",
            "total_monthly_installment.*"=>"numeric",
        ];

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
