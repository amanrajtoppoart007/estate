<?php
namespace App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use App\TenantDocument;
use Auth;
class UpdateTenantDoc
{
  var $tenant_id;
   public function __construct($id)
   {
       $this->tenant_id = $id;
   }
   public function execute(Request $request)
   {

        $admin_id        = Auth::guard('admin')->user()->id;
        $folder          = 'tenant/'.Str::studly(strtolower($request->tenant_name));
        $uploads         = array('last_sewa_id','marriage_certificate','no_sharing_agreement','trade_license');
        $files           = GlobalHelper::multiStepFileUpload('local',$uploads,$folder);
        $return          = array();
        foreach ($files as $file)
        {
            $input              = array();
            $input['tenant_id'] = $this->tenant_id;
            $input['admin_id']  = $admin_id;
            $input['doc_type']  = $file['key'];
            $input['doc_url']   = $file['file'];
            $input['doc_ext']   = $file['ext'];
            if(TenantDocument::where(['tenant_id'=>$this->tenant_id,'doc_type'=>$file['key']])->first())
            {
               TenantDocument::where(['tenant_id'=>$this->tenant_id,'doc_type'=>$file['key']])->update(['is_disabled'=>'1','updated_at'=>date('Y-m-d H:i:s')]);
            }
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
