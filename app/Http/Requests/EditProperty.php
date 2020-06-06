<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\Request;

class EditProperty extends FormRequest
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
            //basic detail
            'propcode' => 'bail|required|max:255',
            'title' => 'required',
            'type' => 'required',
            'prop_for' => 'required',
            'building_age' => 'required|numeric',
            'total_floors' => 'required|numeric',
            'total_flats' => 'required|numeric',
            //address detail
            'address' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            //unit detail
            'unit_type.*' => 'required',
            'unit_size.*' => 'required',
            'rent_type.*' => 'required',
            'rental_amount.*' => 'required|numeric',
            'bedroom.*' => 'required|numeric',
            'bathroom.*' => 'required|numeric',
            'furnishing.*' => 'required',
            'balcony.*' => 'required',
            'parking.*' => 'required',
            'kitchen.*' => 'numeric',
            'hall.*' => 'numeric',
            'total_unit.*' => 'required|numeric',

            //extra detail
            'description' => 'required',
            'feature'    => 'required|array|min:1',
            'feature.*'    => 'distinct',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',

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
