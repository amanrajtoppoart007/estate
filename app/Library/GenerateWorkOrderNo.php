<?php
namespace App\Library;
use App\MaintenanceWork;
class GenerateWorkOrderNo
{
   var $params = array();
   public function __construct($input = array())
   {
       $this->params = $input;
   }
   public function execute()
   {
        $unit_id   = $this->params['property_unit_id'];
        $count     = MaintenanceWork::where(['property_unit_id'=>$unit_id])->count();
        $count     = str_pad(($count+1),5,'0',STR_PAD_LEFT);
        $unitcode  = pluck_single_value('property_units','id',$unit_id,'unitcode');
        return "$unitcode-$count";
   }
}
