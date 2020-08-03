<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBuyer extends FormRequest
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
            'name'=>'required|unique:buyers,name',
            'mobile'=>'required|numeric|unique:buyers,mobile',
            'email'=>'required|email|unique:buyers,email',
            'password'=>'required',
            'passport'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'visa'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'emirates_id'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'buyer_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
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
