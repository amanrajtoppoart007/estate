<?php
namespace App\Library;
use App\Helpers\GlobalHelper;
use App\UnitPrice;
use Carbon\Carbon;
use App\PropertyUnit;
use App\PropertyUnitType;
use App\Library\CreateUnitCode;
use Illuminate\Http\Request;

class StorePropertyUnitTypes
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
        $floor_plans = GlobalHelper::multipleFileUpload($request,'public','floor_plan','floor_plans');
        foreach($input['unit_series'] as $unit_series)
        {
            $params = [
            'property_id'=>$this->property_id,
            'unit_type_sequence'=>$this->unit_type_sequence_counter(),
            'unit_series'=>$unit_series,
            'floor'=>$input['floor'][$i],
            'unit_size'=> trim_unit_size($input['unit_size'][$i]),
            'bedroom'=>$input['bedroom'][$i],
            'bathroom'=>$input['bathroom'][$i],
            'balcony'=>$input['balcony'][$i],
            'parking'=>$input['parking'][$i],
            'floor_plan'=>$floor_plans[$i] ? $floor_plans[$i] : null,
            ];

            $prop_unit_type = PropertyUnitType::create($params);
/*            if($prop_unit_type)
            {
                $prop_unit_type_id = $prop_unit_type->id;
                for($j=0;$j<intval($request['total_unit'][$i]);$j++)
                {
                    $gen_code = new CreateUnitCode($this->property_id,$prop_unit_type_id);
                    $unitcode = $gen_code->generate_unit_code();
                    $unit_params = [
                        'property_unit_type_id'=>$prop_unit_type_id,
                        'unitcode'=>$unitcode,
                        'property_id'=>$this->property_id,
                        'admin_id'=>$this->admin_id,
                        'owner_id'=>$request['owner_id'],
                        'agent_id'=>$request['agent_id'],
                        'unit_status'=>1,
                        'title'=>$unit_type,
                        'rent_type'=>$request['rent_type'][$i],
                        'unit_size'=> trim_unit_size($request['unit_size'][$i]),
                        'bedroom'=>$request['bedroom'][$i],
                        'bathroom'=>$request['bathroom'][$i],
                        'furnishing'=>$request['furnishing'][$i],
                        'balcony'=>$request['balcony'][$i],
                        'parking'=>$request['parking'][$i],
                        'kitchen'=>$request['kitchen'][$i],
                        'hall'=>$request['hall'][$i],
                    ];
                   $unit =  PropertyUnit::create($unit_params);
                   if(!empty($unit))
                   {
                       $date       = new Carbon(date('Y-m-d'));
                       switch($request['rent_type'][$i])
                       {
                           case 'yearly':
                            $effective_upto    = $date->addYear(1);
                           break;
                           case 'monthly':
                            $effective_upto   = $date->addMonth(1);
                           break;
                           case 'weekly':
                             $effective_upto = $date->addWeek(1);
                           break;
                           default:
                             $effective_upto   = $date->addMonth(1);
                            break;
                       }
                       $effective_from = date('Y-m-d');
                       $effective_upto = $effective_upto->format('Y-m-d');
                       $price     = [
                           'property_unit_id'=>$unit->id,
                           'unit_price'=>floatval($request['rental_amount'][$i]),
                           'status'=>1,
                           'effective_from'=>$effective_from,
                           'effective_upto'=>$effective_upto
                       ];
                      UnitPrice::create($price);
                   }
                }
            }*/

            $i++;//because we used foreach loop and a seperate counter
        }
    }
}
