<?php
namespace App\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Tenant;
class CreateTenant
{

   public function execute()
   {
        $store = request()->only(["tenant_name","email","mobile","tenant_type","country_id","state_id","city_id"]);
        if(request()->has("password"))
        {
            $store['password'] = Hash::make(request()->password);
        }
        if($tenant = Tenant::create($store))
        {
           return $tenant->id;
        }
        return false;
   }
}
