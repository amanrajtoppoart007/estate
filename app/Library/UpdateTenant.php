<?php 
namespace App\Library;
use Illuminate\Http\Request;
use App\Tenant;
class UpdateTenant
{
    var $tenant_id;
   public function __construct($id)
   {
       $this->tenant_id = $id;
   }
   public function execute(Request $request)
   {
       $update = array();
       $params = array('name','email','mobile','tenant_type');
       foreach($params as $column)
       {
           if(!empty($request->$column))
           {
               $update[$column] = $request->$column;
           }
       }
       if(!empty($update))
       {
           if(Tenant::where(['id'=>$this->tenant_id])->update($update))
            {
                return $this->tenant_id;
            }
       }    
       return false;
   }
}