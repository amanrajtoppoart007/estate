<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TenantResource;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\CommonResource;
class PropertyUnitAllotmentResource extends JsonResource
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
              'unitcode'=>$this->unitcode,
              'property'=> new PropertyResource($this->property),
              'propertyUnitType'=> new CommonResource($this->property_unit_type),
              'property_unit'=>new CommonResource($this->property_unit),
              'tenant'=>new TenantResource($this->tenant),
              'rent_amount'=>$this->rent_amount,
              'lease_start'=>date('d-m-Y',strtotime($this->lease_start)),
              'lease_end'=>date('d-m-Y',strtotime($this->lease_end)),
              'status'=>$this->status,
              'installments'=>$this->installments,
              'allotment_detail_url'=>route('allotment.detail',['id'=>$this->tenant_id,'allotmentId'=>$this->id]),

        ];
    }
}
