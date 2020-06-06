<?php
namespace App\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use App\User;
class CreateUser
{
   
   public function execute(Request $request)
   {
        $params['name'] = $request->tenant_name;
        $params['email'] = $request->email;
        $params['mobile'] = $request->mobile;
        if(!empty($request->password))
        {
           $params['password'] = Hash::make($request->password);
        }
        if($user = User::create($params))
        {
           return $user->id;
        }
        return false;
   }
}