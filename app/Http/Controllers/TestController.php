<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function import()
    {
        $result = DB::table('owner_import')->get();
        foreach($result as $row)
        {
            $input['name'] = $row->name;
            $input['email'] =  (filter_var($row->email, FILTER_VALIDATE_EMAIL))? $row->email : null;
            $input['mobile'] = preg_replace('/\D/', '', $row->mobile);
            $input['country_id'] = $this->get_nation_id($row->nationality);
            $input['country_code'] = $this->get_country_code($row->nationality);
            $input['firm_type'] = 'individual';
            $input['owner_type'] = 'owner';


            if(!empty($row->name))
            {
                if (DB::table('owners')->insert($input)) {
                    print_r("<pre>");
                    print_r($input);
                    print_r("</pre>");
                }
            }

        }
    }

    public function get_nation_id($nation)
    {
        $country = Country::where('name','like',"%$nation%")->first();
        if(!empty($country))
        {
            return $country->id;
        }
        return null;
    }
    public function get_country_code($nation)
    {
        $country = Country::where('name','like',"%$nation%")->first();
        if(!empty($country))
        {
            return $country->code;
        }
        return null;
    }

    public function trim_countries()
    {
       $countries = DB::table('countries')->get();
       foreach($countries as $cnt)
       {
           $country = Country::find($cnt->id);

           $code = preg_replace("/[a-zA-Z]/","",$country->code);
       }

    }

    public function insert_some_data(){
        $arr = array('BOOKING_FEES','COMMISSION','CONTRACT_FEES','FIRST_PAYMENT','MAINTENANCE_FEES','MAINTENANCE_QUOTATION_WORK',
            'MUNICIPALITY_FEES','OFFICE_CHARGES','PEST_CONTROL_SERVICE','REGISTRATION_FEES','REMOTE_DEPOSIT','RENT_PAYMENT','SECURITY_DEPOSIT','SEWA_DEPOSIT','OTHER');
        $ar = array('name'=>'transaction_description','value'=>json_encode($arr));
       try {
           DB::table('accounting_settings')->insert($ar);
       }catch (\Exception $e){
           print_r($e->getMessage());
       }
    }
}
