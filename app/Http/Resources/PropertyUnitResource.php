<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyUnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'property_title'=>$this->property->title,
            'unit_title'=>$this->unit_title,
            'broker'=>$this->broker,
            'allotment_price'=>$this->allotment_price,
            'unitcode'=>$this->unitcode,
            'unit_type'=>$this->title,
            'owner_name'=>$this->owner_name,
            'owner_mobile'=>$this->owner_mobile,
            'lease_start'=>$this->lease_start,
            'lease_end'=>$this->lease_end,
            'client_id'=>$this->client_id,
            'client_name'=>$this->client_name,
            'allotment_type' => strtoupper($this->allotment_type),
            'allotment_id'=>$this->allotment_id,
            'status'=>$this->status,
            'unit_status'=> getPropertyUnitStatus($this->unit_status),
            'created_at'=>date('d-m-Y',strtotime($this->created_at)),
            'view_url'=>route('property.unit.view',$this->id),
            'edit_url'=>route('property.unit.view',$this->id),
            'collection_route'=>$this->collection_route,
        ];
    }
}
