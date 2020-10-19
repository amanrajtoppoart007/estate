<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\Request;

class StorePropertyUnit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         return auth("admin")->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'flat_number'=>'required',
            'floor_no'=>'required',
            'unit_size' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'furnishing' => 'required',
            'balcony' => 'required|numeric',
            'parking' => 'required',
            'rent_type' => 'required',
            'unit_price' => 'required|numeric',
            'property_unit_type_id'=>'required|numeric',
            'property_id'=>'required|numeric',
            'unit_status'=>'numeric',
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
