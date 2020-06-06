<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\Request;

class UpdateTenant extends FormRequest
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

        $validate = [
            'tenant_type'=>'required',
            'city'=>'required',
            'address'=>'required',
            'tenant_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric|digits:10',
            'country'=>'required',
            'bank_passbook'=> 'mimes:jpeg,jpg,png,gif,pdf|max:10000',
            'passport'=> 'mimes:jpeg,jpg,png,gif,pdf|max:10000',
            'visa'=> 'mimes:jpeg,jpg,png,gif,pdf|max:10000',
            'emirates_id'=> 'mimes:jpeg,jpg,png,gif,pdf|max:10000',
            'dob'=> 'required',
            ];
        if($request['tenant_type']=='company')
        {
            $validate['company_name'] = 'required';
            $validate['trade_license'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
            $validate['tenant_count'] = 'required|numeric';
        }
        else if($request['tenant_type']=='family_husband_wife')
        {
            $validate['marriage_certificate'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
            $validate['tenant_count'] = 'required|numeric';
            $validate['rel_name.*'] = 'required';
            $validate['rel_relationship.*'] = 'required';
            $validate['rel_amirates_id.*'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
            $validate['rel_passport.*'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
            $validate['rel_visa.*'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
        }
        else if($request['tenant_type']=='family_brother_sister')
        {
            $validate['tenant_count'] = 'required|numeric';
            $validate['rel_name.*'] = 'required';
            $validate['rel_relationship.*'] = 'required';
            $validate['rel_amirates_id.*'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
            $validate['rel_passport.*'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
            $validate['rel_visa.*'] = 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000';
        }
        else 
        {
            $validate['tenant_count'] = 'required|numeric|digits:1';
            $validate['no_sharing_agreement'] = 'mimes:jpeg,jpg,png,gif,pdf|max:10000';
        }
        return $validate;
        
    }
    protected function failedValidation(Validator $validator)
    {
        $res['status']   = '0';
        $res['response'] = 'validation_error';
        $res['message']  = $validator->errors()->all();
        throw new HttpResponseException(response()->json($res, 200));
    }
}