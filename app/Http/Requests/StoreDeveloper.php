<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDeveloper extends FormRequest
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
        $request = request()->all();
        $rules = [
            'name'=>'required|unique:owners,name',
            'mobile'=>'required|digits:10|unique:owners,mobile|',
            'email'=>'required|email|unique:owners,email',
            'password'=>'required',

            'passport'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',

            'bank_name'=>'required',
            'bank_swift_code'=>'required',
            'bank_account'=>'required',
            'country_id'=>'required|numeric',
            'state_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required',
            'owner_type'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg|max:10048',

            'passport_exp_date'=>'required|date',

            'poa_exp_date'=>'required|date',
        ];

        if(request()->hasFile("visa"))
        {
            $rules['visa']='mimes:jpeg,png,jpg,pdf|max:10048';
            $rules['visa_exp_date']='required|date';
        }
         if(request()->hasFile("emirates_id_doc"))
        {
            $rules['emirates_id_doc']='mimes:jpeg,png,jpg,pdf|max:10048';
            $rules['emirates_exp_date']='required|date';
        }
        if($request['owner_type']=='company')
        {
            $rules['company_name'] = 'required';
            $rules['trade_license'] = 'required';
            $rules['license_expiry_date'] = 'required';
            $rules['telephone_number'] = 'required';
            $rules['office_address'] = 'required';
        }

        if(request()->has("authorised_person_required"))
        {
            $rules['auth_person_name'] = 'required';
            $rules['auth_person_designation'] = 'required';
            $rules['auth_person_country_code'] = 'required';
            $rules['auth_person_mobile'] = 'required|numeric|digits:10';
            $rules['auth_person_email'] = 'required|email';
            if(request()->hasFile('auth_person_emirates_id_doc'))
           {
             $rules['auth_person_emirates_id_doc']   = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
             $rules['auth_person_emirates_exp_date'] = 'required|date';
           }
            if(request()->hasFile('auth_person_passport'))
           {
             $rules['auth_person_passport'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
             $rules['auth_person_passport_exp_date']= 'required|date';
           }
            if(request()->hasFile('auth_person_visa'))
           {
             $rules['auth_person_visa'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
             $rules['auth_person_visa_exp_date']= 'required|date';
           }
            if(request()->hasFile('auth_person_power_of_attorney'))
           {
             $rules['auth_person_power_of_attorney'] = 'required|mimes:jpeg,png,jpg,pdf|max:10048';
             $rules['auth_poa_exp_date']             = 'required|date';
           }
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
