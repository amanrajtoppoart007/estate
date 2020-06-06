<?php
namespace App\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Tenant;
class CreateTenant
{
   
   public function execute(Request $request)
   {
        $params['name'] = $request->tenant_name;
        $params['email'] = $request->email;
        $params['mobile'] = $request->mobile;
        $params['tenant_type'] = $request->tenant_type;
        $params['country_id'] = $request->country;
        $params['password'] = Hash::make($request->password);
        if($tenant = Tenant::create($params))
        {
           return $tenant->id;
        }
        return false;
   }
}