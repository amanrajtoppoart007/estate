<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\Request;

class RenewPropertyAllotment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'lease_start' => 'required',
                'lease_end' => 'required',
                'tenant_id' => 'required|numeric',
                'property_id' => 'required|numeric',
                'property_unit_type_id' => 'required|numeric',
                'unit_id' => 'required|numeric',
                'security_deposit.*' => 'required|numeric',
                'rent_amount' => 'required|numeric',
                'installments' => 'required|numeric',
                'installment_amount.*' => 'required|numeric',
                'sewa_deposit.*'=>'required|numeric',
                'municipality_fees.*'=>'required|numeric',
                'brokerage.*'=>'required|numeric',
                'contract.*'=>'required|numeric',
                'remote_deposit.*'=>'required|numeric',
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
