<?php
namespace App\Library;
use Illuminate\Support\Arr;

class PropertyView extends ObjectView
{
    public function construct()
    {

    }

    public function multiple($list)
    {
        if(!$list->isEmpty())
        {
            $result = array();
            $result['data']  = array();
            $result['links'] = array();
            $result['total'] = array();
            $result['count'] = array();
            $i=0;
            foreach($list as $unit)
            {
                $result['data'][$i]['id']     = $unit->id ? $unit->id: 0;

                $result['data'][$i]['title'] = $unit->property ? $unit->property->title: null;
                $result['data'][$i]['primary_image'] = $unit->property ? $unit->property->primary_image: 0;
                $result['data'][$i]['description'] = $unit->property ? $unit->property->description: null;
                $result['data'][$i]['full_address'] = $unit->property ? $unit->property->full_address: null;

                $result['data'][$i]['unit_size'] = $unit->unit_size ? $unit->unit_size: 0;
                $result['data'][$i]['unit_rent'] = $unit->unit_rent ? $unit->unit_rent: 0;
                $result['data'][$i]['unit_price'] = $unit->unit_price ? $unit->unit_price: 0;
                $result['data'][$i]['bedroom'] = $unit->bedroom ? $unit->bedroom: 0;
                $result['data'][$i]['bathroom'] = $unit->bathroom ? $unit->bathroom: 0;
                $result['data'][$i]['parking'] = $unit->parking ? $unit->parking: 0;
                $result['data'][$i]['created_at'] = $unit->created_at ? $unit->created_at->diffForHumans(): 0;
                $result['data'][$i]['unitcode'] = $unit->unitcode ? $unit->unitcode: null;
                $result['data'][$i]['floor_no'] = $unit->floor_no ? $unit->floor_no: null;

                if($unit->purpose==1)
                {
                    $result['data'][$i]['price'] = $unit->unit_rent ? $unit->unit_rent.' AED/'.$unit->rent_type : null;
                }
                if($unit->purpose==2)
                {
                    $result['data'][$i]['price'] = $unit->unit_price ? $unit->unit_price.' AED' : null;
                }
                if($unit->purpose==3)
                {
                    $result['data'][$i]['price'] = $unit->unit_price. ' AED FOR SELL/'.$unit->unit_rent.' AED/'.$unit->rent_type.' FOR RENT';
                }

                $i++;
            }
            if (method_exists($list, 'links')) {
                    $request = request()->except('page');
                    $result['links'] = $list->appends($request)->links('vendor.pagination.guest');
                    $result['total'] = $list->total();
                    $result['count'] = $list->count();
                }
                return $result;
        }
        return [];
    }

    public function single()
    {
        
    }
}
