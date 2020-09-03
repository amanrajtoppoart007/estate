<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAgent extends FormRequest
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
            'name'=>'required|unique:agents,name',
            'country_code'=>'required|numeric',
            'mobile'=>'required|unique:agents,mobile|',
            'email'=>'required|email|unique:agents,email',
            'password'=>'required',
            'bank_name'=>'required',
            'bank_swift_code'=>'required',
            'bank_account'=>'required',
            'banking_name'=>'required',
            'country_id'=>'required|numeric',
            'state_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required',
            'photo'=>'required|image|mimes:jpeg,png,jpg|max:10048',

        ];
          /*'emirates_id_doc'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'passport'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'visa'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',*/
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


        if(request()->has("authorised_person_required"))
        {
            $rules['auth_person_name'] = 'required';
            $rules['auth_person_designation'] = 'required';
            $rules['auth_person_country_code'] = 'required';
            $rules['auth_person_mobile'] = 'required|numeric|digits:10';
            $rules['auth_person_email'] = 'required|email';
            if (request()->hasFile('auth_person_emirates_id_doc')) {
                $rules['auth_person_emirates_id_doc'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
                $rules['auth_person_emirates_exp_date'] = 'required|date';
            }
            if (request()->hasFile('auth_person_passport')) {
                $rules['auth_person_passport'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
                $rules['auth_person_passport_exp_date'] = 'required|date';
            }
            if (request()->hasFile('auth_person_visa')) {
                $rules['auth_person_visa'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
                $rules['auth_person_visa_exp_date'] = 'required|date';
            }
            if (request()->hasFile('auth_person_power_of_attorney')) {
                $rules['auth_person_power_of_attorney'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
                $rules['auth_poa_exp_date'] = 'required|date';
            }
        }

        return $rules;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if((!empty(request()->emirates_exp_date)) && (!empty(request()->visa_exp_date)))
            {

                if (strtotime(request()->emirates_exp_date) !== strtotime(request()->visa_exp_date)) {

                    $validator->errors()->add('expiry_date', 'Emirates id expiry date & visa expiry data should be same');
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
