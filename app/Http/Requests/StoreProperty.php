<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\Request;
class StoreProperty extends FormRequest
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
            'title' =>  'required|unique:properties,title',
            'type' => 'required',
            'prop_for' => 'required',
            //address detail
            'address' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'zip' => 'numeric',

            'total_floors' => 'required|numeric',
            'total_flats' => 'required|numeric',
            //unit detail
            'unit_series.*' => 'required',
            'unit_size.*' => 'required',


            'bathroom.*' => 'required',
            'bedroom.*' => 'required',

            'balcony.*' => 'required',
            'parking.*' => 'required',


            //extra detail
            'description' => 'required',
            'feature'    => 'required|array|min:1',
            'feature.*'    => 'distinct',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:10048',

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
