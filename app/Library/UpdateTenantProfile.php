<?php
namespace App\Library;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use App\TenantProfile;
class UpdateTenantProfile
{

   public function execute(Request $request,$tenant_id)
   {
        $input                     = $request->only(['tenant_count','country_code','mobile','address','city','state','country','company_name']);
        $input['name']             = $request->tenant_name;
        $input['dob']              = date('Y-m-d',strtotime($request->dob));
        $input['tenant_id']        = $tenant_id;
        $input['admin_id']         = Auth::guard('admin')->user()->id;
        $folder                    = Str::studly(strtolower($request->tenant_name));
        $input['profile_image']    = GlobalHelper::singleFileUpload('local','profile_image',"tenant/$folder");

        if($profile = TenantProfile::where(['tenant_id'=>$tenant_id])->update($input))
        {
           return true;
        }
        return false;
   }

}
