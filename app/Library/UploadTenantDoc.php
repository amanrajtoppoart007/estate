<?php
namespace App\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use App\TenantDocument;
use Auth;
class UploadTenantDoc
{

   public function execute(Request $request,$tenant_id)
   {

        $admin_id        = Auth::guard('admin')->user()->id;
        $folder          = 'tenant/'.Str::studly(strtolower($request->tenant_name));
        $uploads         = array('last_sewa_id','marriage_certificate','no_sharing_agreement','trade_license');
        $files           = GlobalHelper::multiStepFileUpload('local',$uploads,$folder);
        $return          = array();
        foreach ($files as $file)
        {
            $input              = array();
            $input['tenant_id'] = $tenant_id;
            $input['admin_id']  = $admin_id;
            $input['doc_type']  = $file['key'];
            $input['doc_url']   = $file['file'];
            $input['doc_ext']   = $file['ext'];
            if($doc = TenantDocument::create($input))
            {
              $document             = array();
              $document['doc_type'] = $file['key'];
              $document['id']       = $doc->id;
              array_push($return,$document);
            }
        }

        return $return;
   }

}
