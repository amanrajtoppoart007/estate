<?php
namespace App\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use App\TenantProfile;
use Auth;
class CreateTenantProfile
{
   
   public function execute(Request $request,$tenant_id,$documents)
   {
        $input                     = array();
        $input                     = $request->only(['tenant_count','country_code','mobile','address','city','state','country','company_name']);
        $input['name']             = $request->tenant_name;
        $input['dob']              = date('Y-m-d',strtotime($request->dob));
        $input['tenant_id']        = $tenant_id;
        $input['admin_id']         = Auth::guard('admin')->user()->id;
        $folder                    = Str::studly(strtolower($request->tenant_name));
        $input['profile_image']    = GlobalHelper::singleFileUpload($request,'local','profile_image',"tenant/$folder");
        if(!empty($documents))
        {
           $valid_docs         = array('passport','visa','emirates_id','bank_passbook','last_sewa_id','marriage_certificate','no_sharing_agreement','trade_license');
           if(is_array($documents))
           {
              foreach($documents as $doc)
              {
                  if(in_array($doc['doc_type'],$valid_docs))
                  {
                     $input[$doc['doc_type']] = $doc['id'];
                  }
              }
           }
        }
        if($profile = TenantProfile::create($input))
        {
           return $profile->id;
        }
        return false;
   }
   
}
  