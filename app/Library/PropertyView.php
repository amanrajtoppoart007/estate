<?php
namespace App\Library;
use App\Http\Resources\ApiResource;
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
                $result['data'][$i]['property_id'] = $unit->property ? $unit->property->id : null;
                $result['data'][$i]['primary_image'] = $unit->property ? $unit->property->primary_image: asset("theme/images/no-image.png");
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
                $result['data'][$i]['latitude'] = $unit->property ? $unit->property->latitude:null;
                $result['data'][$i]['longitude'] = $unit->property ? $unit->property->longitude:null;

                if($unit->purpose==1)
                {
                    $result['data'][$i]['price'] = $unit->unit_rent ? $unit->unit_rent.' AED/'.$unit->rent_type : null;
                    $result['data'][$i]['purpose'] = 'RENT';
                }
                if($unit->purpose==2)
                {
                    $result['data'][$i]['price'] = $unit->unit_price ? $unit->unit_price.' AED' : null;
                    $result['data'][$i]['purpose'] = 'SALE';
                }
                if($unit->purpose==3)
                {
                    $result['data'][$i]['price'] = $unit->unit_price. ' AED FOR SELL/'.$unit->unit_rent.' AED/'.$unit->rent_type.' FOR RENT';
                    $result['data'][$i]['purpose'] = 'RENT & SALE';
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

    public function single($unit)
    {
       $result = null;
        if(!empty($unit))
        {
                $result['id']     = $unit->id ? $unit->id: 0;

                $result['title'] = $unit->property ? $unit->property->title : '';
                $result['property_id'] = $unit->property ? $unit->property->id : '';
                $result['primary_image'] = $unit->property ? $unit->property->primary_image:'';
                $result['description'] = $unit->property ? $unit->property->description:'';
                $result['full_address'] = $unit->property ? $unit->property->full_address:'';

                $result['unit_size'] = $unit->unit_size ? $unit->unit_size: 0;
                $result['unit_rent'] = $unit->unit_rent ? $unit->unit_rent: 0;
                $result['unit_price'] = $unit->unit_price ? $unit->unit_price: 0;
                $result['bedroom'] = $unit->bedroom ? $unit->bedroom: 0;
                $result['bathroom'] = $unit->bathroom ? $unit->bathroom: 0;
                $result['parking'] = $unit->parking ? $unit->parking: 0;
                $result['created_at'] = $unit->created_at ? $unit->created_at->diffForHumans(): 0;
                $result['unitcode'] = $unit->unitcode ? $unit->unitcode: null;
                $result['floor_no'] = $unit->floor_no ? $unit->floor_no: null;
                $result['floor_plan'] = $unit->floor_plan ? $unit->floor_plan: null;
                $result['agent_name'] = $unit->agent ? $unit->agent->name : null;
                 $result['latitude'] = $unit->property ? $unit->property->latitude:null;
                $result['longitude'] = $unit->property ? $unit->property->longitude:null;

                if($unit->purpose==1)
                {
                    $result['price'] = $unit->unit_rent ? $unit->unit_rent.' AED/'.$unit->rent_type : null;
                    $result['purpose'] = 'RENT';
                }
                if($unit->purpose==2)
                {
                     $result['price'] = $unit->unit_price ? $unit->unit_price.' AED' : null;
                     $result['purpose'] = 'SALE';
                }
                if($unit->purpose==3)
                {
                     $result['price'] = $unit->unit_price. ' AED FOR SELL/'.$unit->unit_rent.' AED/'.$unit->rent_type.' FOR RENT';
                     $result['purpose'] = 'RENT & SALE';
                }

                if(!empty($unit->property->imageable))
                {
                    $i =0;
                    foreach($unit->property->imageable as $image)
                    {
                        $result['images'][$i] = $image->image_url ? asset($image->image_url) : null;
                        $i++;
                    }
                }

                if(!empty($unit->property->feature))
                {
                    $features = explode(",",$unit->property->feature);
                    if(is_array($features))
                    {
                        $i=0;
                        foreach($features as $feature)
                        {
                            $result['amenities'][$i] = pluck_single_value("property_features","id",$feature,"title");
                        }
                    }
                    else
                    {
                        $result['amenities'][0] = pluck_single_value("property_features","id",$features,"title");
                    }
                }


        }
        return $result;
    }
}
