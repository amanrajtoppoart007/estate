<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditRentEnquiry extends FormRequest
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
             'rent_enquiry_id'=>'required|numeric',
             'name'=>'required',
             'email'=>'required|email',
             'mobile'=>'required',
             'country_code'=>'required',
             'address'=>'required',
             'category'=>'required',
             'property_type'=>'required',
             'preferred_location'=>'required',
             'bedroom'=>'required',
             'budget'=>'required',
             'tenancy_type'=>'required',
             'tenant_count'=>'required',
             'agent_id'=>'required',
             'source'=>'required'

        ];
        if (request()->source=="website") {
                if(empty(request()->website))
                {
                    $rules['website'] = "required";
                }
                if (!filter_var(request()->website, FILTER_VALIDATE_URL)) {
                    $rules['website'] = "url";
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
