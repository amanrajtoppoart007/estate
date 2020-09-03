<?php
namespace App\Library;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Tenant;
use Illuminate\Support\Str;

class TenantAction
{

   public function data()
   {
        $store = request()->only(["name","email","mobile","tenant_type","country_id","state_id","city_id"]);
        if(request()->has("password"))
        {
            $store['password'] = Hash::make(request()->password);
        }
        if(request()->has("profile_image"))
        {
            $folder = Str::studly(request()->name);
            $store['profile_image'] = GlobalHelper::singleFileUpload('local','photo',"owners/$folder");
        }
        return $store;
   }

   public function store_data()
   {
       if($tenant = Tenant::create($this->data()))
       {
           return $tenant->id;
       }
       return false;
   }

   public function update_data()
   {
       if(request()->has("tenant_id"))
       {
           if(Tenant::where(['id'=>request()->tenant_id])->update($this->data()))
           {
               return request()->tenant_id;
           }
       }
       return false;
   }
}
