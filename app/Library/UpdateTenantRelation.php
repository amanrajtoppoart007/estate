<?php
namespace App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use App\TenantRelation;
class UpdateTenantRelation
{

   public function execute($tenant_id,Request $request)
   {
          $cnt = 0;
          $folder        = Str::studly($request->tenant_name);
          $loop_count    = count($request->rel_name);
          $passport      = GlobalHelper::multipleFileUpload($request,'local','rel_passport',"tenant/$folder");
          $visa          = GlobalHelper::multipleFileUpload($request,'local','rel_visa',"tenant/$folder");
          $emirates_id   = GlobalHelper::multipleFileUpload($request,'local','rel_amirates_id',"tenant/$folder");
          for($i=0;$i<$loop_count;$i++)
          {
              $relation['tenant_id'] = $tenant_id;
              $relation['name'] = $request->rel_name[$i];
              $relation['relationship'] = $request->rel_relationship[$i];
              if(!empty($emirates_id[$i]))
              {
                  $relation['emirates_id'] = ($emirates_id[$i]) ? ($emirates_id[$i]) : null;
              }
              if(!empty($visa[$i]))
              {
                  $relation['visa'] = ($visa[$i]) ? ($visa[$i]) : null;
              }
              if(!empty($passport[$i]))
              {
                  $relation['passport'] = ($passport[$i]) ? ($passport[$i]) : null;
              }
            if(!empty($request->rel_id[$i]))
            {
                if($rel = TenantRelation::where(['id'=>$request->rel_id[$i]])->update($relation)) {
                    $cnt++;
                }
            }
            else
            {
                if ($rel = TenantRelation::create($relation)) {
                    $cnt++;
                }
            }
          }
        return $cnt;
   }

}
