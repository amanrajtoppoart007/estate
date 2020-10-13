<?php
namespace App\Library;

class SingleUnitView extends ObjectView
{
    protected $unit;
    public function __construct($unit)
    {
        $this->unit = $unit;
    }
    public function execute()
    {
        if(!empty($this->unit))
        {
            $result                   = array();
            $result['property_title'] = $this->return_object_key($this->unit->property,'title');
            $result['propcode']       = $this->return_object_key($this->unit->property,'propcode');
            $result['unitcode']       = $this->return_object_key($this->unit,'unitcode');
            $result['unit_type']      = $this->return_object_key($this->unit,'title');
            $result['unit_size']      = $this->return_object_key($this->unit,'unit_size');
            $result['bedroom']        = $this->return_object_key($this->unit,'bedroom');
            $result['bathroom']       = $this->return_object_key($this->unit,'bathroom');
            $result['balcony']        = $this->return_object_key($this->unit,'balcony');
            $result['parking']        = $this->return_object_key($this->unit,'parking');
            $result['hall']           = $this->return_object_key($this->unit,'hall');
            $result['allotment_id']   = $this->return_object_key($this->unit, 'allotment_id');
            $result['allotment_type'] = $this->return_object_key($this->unit, 'allotment_type');
            $result['kitchen']        = $this->return_object_key($this->unit,'kitchen');
            $result['unit_status']    = getPropertyUnitStatus($this->return_object_key($this->unit, 'unit_status'));
            $result['owner_name']     = $this->return_object_key($this->unit->owner,'name');
            $result['owner_email']    = $this->return_object_key($this->unit->owner,'email');
            $result['owner_mobile']   = $this->return_object_key($this->unit->owner,'mobile');
            $result['owner_passport'] = route('get.doc',base64_encode($this->return_object_key($this->unit->owner,'passport')));
            $result['owner_emirates_id'] = $this->return_object_key($this->unit->owner,'emirates_id');
            $result['owner_visa']     = route('get.doc', base64_encode($this->return_object_key($this->unit->owner,'visa')));
            $result['owner_country']  = $this->unit->country ? $this->unit->country->name : '';
            $result['owner_state']    = $this->unit->state ? $this->unit->state->name : '';
            $result['owner_city']     = $this->unit->city ? $this->unit->state->city : '';
            $result['owner_address']  = $this->return_object_key($this->unit->owner,'address');
            if($this->unit->allotment_type == 'rent')
            {
                $result['client_name']    = $this->return_object_key($this->unit->allotment->tenant,'name');
                $result['client_email']   = $this->return_object_key($this->unit->allotment->tenant,'email');
                $result['client_mobile']  = $this->return_object_key($this->unit->allotment->tenant,'mobile');
                $result['client_country'] = $this->return_object_key($this->unit->allotment->tenant,'country');
                $result['client_state']   = $this->return_object_key($this->unit->allotment->tenant,'state');
                $result['client_city']    = $this->return_object_key($this->unit->allotment->tenant,'city');
                $result['client_address'] = $this->return_object_key($this->unit->allotment->tenant,'address');
                $result['rent_history']   = $this->return_object_key($this->unit->allotment, 'rent_installments');
            }
            if($this->unit->allotment_type == 'sale')
            {
                $result['client_name']    = $this->return_object_key($this->unit->allotment->buyer, 'name');
                $result['client_email']   = $this->return_object_key($this->unit->allotment->buyer, 'email');
                $result['client_mobile']  = $this->return_object_key($this->unit->allotment->buyer, 'mobile');
                $result['client_country'] = $this->return_object_key($this->unit->allotment->buyer, 'country');
                $result['client_state']   = $this->return_object_key($this->unit->allotment->buyer, 'state');
                $result['client_city']    = $this->return_object_key($this->unit->allotment->buyer, 'city');
                $result['client_address'] = $this->return_object_key($this->unit->allotment->buyer, 'address');
                $result['sale_history']   = $this->return_object_key($this->unit, 'allotment');
            }
            else
            {
                $result['client_name']    = null;
                $result['client_email']   = null;
                $result['client_mobile']  = null;
                $result['client_country'] = null;
                $result['client_state']   = null;
                $result['client_city']    = null;
                $result['client_address'] = null;
            }
            return $result;
        }
        return [];
    }

}
