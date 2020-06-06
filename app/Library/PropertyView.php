<?php
namespace App\Library;
class PropertyView extends ObjectView
{
    public function construct()
    {

    }
    public function execute($list)
    {
        if(!empty($list))
        {
            $result                        = array();
            $result['property_unit_types'] = array();
            $result['links']               = array();
            $result['total']               = array();
            $result['count']               = array();
            foreach($list as $propUnitType)
            {
                if(!empty($propUnitType->id))
                {
                        $property          = array();
                        $property['property_unit_id'] = $propUnitType->id;
                        $property['full_address']     = $propUnitType->property->full_address;
                        $property['city_name']        = $propUnitType->property->city->name;
                        $property['state_name']       = $propUnitType->property->state->name;
                        $property['country_name']     = $propUnitType->property->country->name;
                        $property['latitude']         = $propUnitType->property->latitude;
                        $property['longitude']        = $propUnitType->property->longitude;
                        $property['description']      = ucfirst(strtolower($propUnitType->property->description));
                        $property['title']            = ucwords($propUnitType->title.','.$this->return_object_key($propUnitType->property,'title'));
                        if($mode = $this->return_object_key($propUnitType->property,'prop_for'))
                        {
                            if($mode==1)
                            {
                            $property['mode']  = 'Rent';
                            $property['price'] = $propUnitType->rental_amount.' <small>AED</small>/<small>'.$propUnitType->rent_type.'</small>';
                            }
                            else if($mode==2)
                            {
                                $property['mode'] = 'Sale';
                                $property['price'] = $propUnitType->rental_amount.' <small>AED</small>';
                            }
                            else 
                            {
                                $property['mode'] = '';
                                $property['price'] = $propUnitType->rental_amount.' <small>AED</small>/<small>';
                            }
                        
                        }
                        else
                        {
                            $property['mode'] = '';
                            $property['price'] = $propUnitType->rental_amount.' <small>AED</small>/<small>';
                        }
                        $property['image'] = asset('theme/default/images/thumbnail/01.jpg');
                        if($images = $this->return_object_key($propUnitType->property,'images'))
                        {
                        if(!$images->isEmpty())
                            {
                                $images = object_to_array($images);
                                $property['image'] = asset($images[0]['image_thumb']);
                            }
                        }
                        $property['unit_size'] = $propUnitType->unit_size;
                        $property['bedroom']   = $propUnitType->bedroom;
                        $property['bathroom']  = $propUnitType->bathroom;
                        $property['rent_type']  = $propUnitType->rent_type;
                        if($propertyType = $this->return_object_key($propUnitType->property,'propertyType'))
                        {
                           $property['property_type'] = $this->return_object_key($propertyType,'title');
                        }
                        else
                        {
                            $property['property_type'] = '';
                        }
                        $propcode               = $this->return_object_key($propUnitType->property,'propcode');
                        $propUnitTypeId         = $this->return_object_key($propUnitType,'id');
                        $property['view_url']   = route('view-property',['propcode'=>$propcode,'id'=>$propUnitTypeId]);
                        $property['propcode']   = $propcode;
                        $property['created_at'] = $propUnitType->created_at->diffForHumans();
                        array_push($result['property_unit_types'],$property);
                    }
                  
                }
                if(method_exists($list,'links'))
                {
                    $request         = request()->except('page');
                    $result['links'] = $list->appends($request)->links('vendor.pagination.guest');
                    $result['total'] = $list->total();
                    $result['count'] = $list->count();
                }
                return $result;
                
        }
        return [];
    }
}
