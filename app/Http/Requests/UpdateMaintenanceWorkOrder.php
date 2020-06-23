<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateMaintenanceWorkOrder extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'maintenance_work_order_id'=>'required|numeric',
            'assignee_id'=>'required'
        ];


        return $rules;
    }
    protected function failedValidation(Validator $validator)
    {
        $res['status']   = 0;
        $res['response'] = 'validation_error';
        $res['message']  = $validator->errors()->all();
        throw new HttpResponseException(response()->json($res, 200));
    }
}
