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
            'mobile'=>'required|unique:owners,mobile|',
            'email'=>'required|email',
            'bank_name'=>'required',
            'bank_swift_code'=>'required',
            'bank_account'=>'required',
            'banking_name'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
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
    protected function failedValidation(Validator $validator)
    {
        $res['status']   = '0';
        $res['response'] = 'validation_error';
        $res['message']  = $validator->errors()->all();
        throw new HttpResponseException(response()->json($res, 200));
    }
}
