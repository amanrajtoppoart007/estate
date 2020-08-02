<?php
namespace App\Library;
use App\PropertyUnitType;
class UpdatePropertyUnitTypes
{
     protected $property_id,$admin_id;
    public function __construct($prop_id,$admin_id)
    {
        $this->property_id = $prop_id;
        $this->admin_id    = $admin_id;
    }
    private function unit_type_sequence_counter()
    {
        $counter = PropertyUnitType::where(['property_id'=>$this->property_id])->count();
        return intval($counter)+1;
    }
    public function handle($request,$input=array())
    {
        $i=0;
        foreach($input['unit_series'] as $series)
        {
            $params = [
            'property_id'=>$this->property_id,
            'unit_series'=>$series,
            'unit_size'=> trim_unit_size($input['unit_size'][$i]),
            'bedroom'=>$input['bedroom'][$i],
            'bathroom'=>$input['bathroom'][$i],
            'balcony'=>$input['balcony'][$i],
            'parking'=>$input['parking'][$i],
                  ];
            if(request()->hasFile("floor_plan.$i"))
            {
                $folder = date('dmyHis');
                $params['floor_plan'] = UploadPublicFiles::handle($request,$folder,"floor_plan.$i","floor_plans");
            }

            if(!empty($request['property_unit_type_id'][$i]))
            {
                PropertyUnitType::where(['id'=>$request['property_unit_type_id'][$i]])->update($params);
            }
            else
            {
                $params['unit_type_sequence'] = $this->unit_type_sequence_counter();
                PropertyUnitType::create($params);
            }
          $i++;
        }
    }
}
