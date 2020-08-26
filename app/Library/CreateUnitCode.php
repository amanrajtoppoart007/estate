<?php
namespace App\Library;

use App\PropertyUnit;

class CreateUnitCode
{
    private $unit_type_id,$propcode,$sequence;
    public function __construct($property_id,$unit_type_id)
    {
        $this->unit_type_id = $unit_type_id;
        $this->propcode     = pluck_single_value('properties','id',$property_id,'propcode');
        $this->sequence     = pluck_single_value('property_unit_types','id',$unit_type_id,'unit_type_sequence');
    }
    public function check_unitcode($code)
    {
        $code =  PropertyUnit::where(['unitcode'=>$code])->first();
        return ($code)?true:false;
    }
    public function get_unit_counter()
    {
        $counter = PropertyUnit::where(['property_unit_type_id'=>$this->unit_type_id])->count();
        return intval($counter)+1;
    }
    public function get_unit_code($counter)
    {
         $code     = $this->propcode.'U'.$this->sequence.$counter;

         if(!$this->check_unitcode($code))
         {
            return $code;
         }
         else
         {
             return $this->get_unit_code(intval($counter)+1);
         }
    }
    public function generate_unit_code()
    {
        if(empty($this->unit_type_id)||empty($this->propcode)||empty($this->sequence))
        {
            return false;
        }
        else
        {
            return $this->get_unit_code($this->get_unit_counter());
        }

    }

}
