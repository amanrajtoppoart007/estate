<?php
namespace App\Library;
use App\Task;
class GenerateTaskCode
{
   var $params = array();
   public function __construct()
   {
       $this->params = request()->all();
   }
   public function execute()
   {
        $unit_id   = $this->params['property_unit_id'];
        $count     = Task::where(['property_unit_id'=>$unit_id])->count();
        //dd($count);
        $count     = str_pad(($count+1),5,'0',STR_PAD_LEFT);
        $unitcode  = pluck_single_value('property_units','id',$unit_id,'unitcode');
        return "$unitcode-$count";
   }
}
