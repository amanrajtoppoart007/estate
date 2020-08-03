<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEmployee extends FormRequest
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
            //basic detail
            'name'=>'required|unique:employees,name',
            'mobile'=>'required|numeric|unique:employees,mobile',
            'email'=>'required|email|unique:employees,email|unique:admins,email',
            'password'=>'required',
            'emirates_id'=>'required',
            //extra detail
            'gender'=>'required',
            'civil_status'=>'required',
            'age'=>'required|numeric',
            'dob'=>'required',
            //account detail
            'bank_name'=>'required',
            'bank_ifsc_code'=>'required',
            'bank_account'=>'required',
            //address detail
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            //department detail
            'department_id'=>'required',
            'designation_id'=>'required',
            'id_number'=>'required',
            'official_email'=>'required',
            'joining_date'=>'required',
            'fixed_salary'=>'required|numeric',
            'status'=>'required',
        ];
        if($request['is_admin']=='1')
        {
            $rules['password'] = 'required';
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
