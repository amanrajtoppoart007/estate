<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditDeveloper extends FormRequest
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
        $rules =  [
            'owner_id'=>'required|numeric',
            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'emirates_id'=>'required',
            'bank_name'=>'required',
            'bank_swift_code'=>'required',
            'bank_account'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'address'=>'required',
            'owner_type'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg|max:10048',
        ];
        if(!empty($request['emirates_id_doc']))
        {
            $rules['emirates_exp_date'] = 'required|date';
        }

        if(!empty($request['passport']))
        {
            $rules['passport_exp_date'] = 'required|date';
        }
        if(!empty($request['visa']))
        {
            $rules['visa_exp_date'] = 'required|date';
        }
        if(!empty($request['poa']))
        {
            $rules['poa_exp_date'] = 'required|date';
        }

        if(!empty($request['auth_person']))
        {
           $rules =  [
            'auth_person_name'=>'required',
            'auth_person_designation'=>'required',
            'auth_person_country_code'=>'required',
            'auth_person_mobile'=>'required',
            'auth_person_email'=>'required',
            'auth_person_emirates_id_doc'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'auth_person_emirates_exp_date'=>'required',
            'auth_person_passport'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'auth_person_passport_exp_date'=>'required',
            'auth_person_visa'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'auth_person_visa_exp_date'=>'required',
            'auth_person_power_of_attorney'=>'required|mimes:jpeg,png,jpg,pdf|max:10048',
            'auth_poa_exp_date'=>'required|date'
           ];
        }

         if($request['owner_type']=='company')
         {
             $rules['company_name'] = 'required';
             $rules['trade_license'] = 'required';
             $rules['license_expiry_date'] = 'required';
             $rules['telephone_number'] = 'required';
             $rules['office_address'] = 'required';
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
