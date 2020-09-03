<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditAgent extends FormRequest
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

            $rules = [
            'id'=>'required|numeric',
            'name'=>'required',
            'country_code'=>'required|numeric',
            'mobile'=>'required|unique:owners,mobile|',
            'email'=>'required|email',
            'bank_name'=>'required',
            'bank_swift_code'=>'required',
            'bank_account'=>'required',
            'banking_name'=>'required',
            'country_id'=>'required|numeric',
            'state_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg|max:10048',

        ];

        if(request()->agent_type=='company')
        {
            $rules['owner_name'] = 'required';
            $rules['owner_email'] = 'required|email';
            $rules['owner_mobile'] = 'required';
            $rules['trade_license'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
            $rules['vat_number'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';

        }
        if(request()->hasFile('emirates_id_doc'))
        {
            $rules['emirates_exp_date'] = 'required|date';
        }
         if(request()->hasFile('passport'))
        {
            $rules['passport_exp_date'] = 'required|date';
        }
         if(request()->hasFile('visa'))
        {
            $rules['visa_exp_date'] = 'required|date';
        }

        return $rules;
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if((!empty(request()->emirates_exp_data)) && (!empty(request()->visa_exp_date)))
            {
                if (request()->emirates_exp_date != request()->visa_exp_date) {
                    $validator->errors()->add('expiry date', 'Emirates id expiry date & visa expiry data should be same');
                }
            }

        });
        return $validator;
    }

    protected function failedValidation(Validator $validator)
    {
        $res['status']   = '0';
        $res['response'] = 'validation_error';
        $res['message']  = $validator->errors()->all();
        throw new HttpResponseException(response()->json($res, 200));
    }
}
