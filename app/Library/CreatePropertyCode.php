<?php
namespace App\Library;

use App\City;
use App\State;
use App\Property;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CreatePropertyCode
{
    public function checkcode($code)
    {
        $result = Property::select('propcode')->where('propcode','LIKE','%'.$code.'%')->get();
        if(count($result)>0)
        {
            $string = substr($code, 0, 3);
            $plus   = preg_replace( '/[^0-9]/', '', $code)+1;
            $string.=str_pad($plus, get_systemSetting('property_code_length'), '0', STR_PAD_LEFT);
            return $this->checkcode($string);
        }
        else
        {
            return $code;
        }
    }
    public function generate_property_code($request=array())
    {

        $input['city']  = pluck_single_value('cities','id',$request['city_id'],'name');
        $input['country']  = pluck_single_value('countries','id',$request['country_id'],'name');
        $validator      = Validator::make($input,[
            'city' => 'required',
            'country' => 'required',
        ]);
        if($validator->fails())
        {
            return false;
        }
        else
        {
                $country = $input['country'];
                $city    = $input['city'];
                $code    = get_first_letters($country);
                $code.= get_first_letters($city);
                $result = Property::select('propcode')->where('propcode','LIKE','%'.$code.'%')->get();
              if(count($result)>0)
              {
                $result=Arr::sort(Arr::pluck($result,'propcode'));
                $result=Arr::last($result);

                $plus = preg_replace( '/[^0-9]/', '', $result)+1;
                $code.=str_pad($plus, get_systemSetting('property_code_length'), '0', STR_PAD_LEFT);
              }
              else
              {
                  $x='1';
                  $x = str_pad($x,get_systemSetting('property_code_length'), '0', STR_PAD_LEFT);
                  $code.=$x;
              }
              $code = $this->checkcode($code);
              return $code;
          }
    }
}
