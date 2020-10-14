<?php
namespace App\Library;
use App\Tenant;

class CreateTenantCode
{
    public function handle()
    {
        return $this->generate(0);
    }

    private function check($code)
    {
         return Tenant::where(['tenant_code'=>$code])->exists();
    }

    private function generate($counter=0)
    {
        $country_name = pluck_single_value("countries","id",request()->country_id,"name");
        $country_name = substr($country_name,0,2);

        if(empty($counter))
        {
            $counter  = $this->counter();
        }
        $sequence = str_pad($counter,6,"0",STR_PAD_LEFT);

         $code = $country_name.$sequence;
         if($this->check($code))
         {
             return $this->generate($counter+1);
         }
         return $code;
    }
    public function counter()
    {
        return Tenant::where(['country_id'=>request()->country_id,'state_id'=>request()->state_id,'city_id'=>request()->city_id])->count();

    }
}
