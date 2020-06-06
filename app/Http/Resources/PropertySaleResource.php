<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertySaleResource extends JsonResource
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
            'property_title'=>$this->property_title,
            'unit_code'=>$this->unit_code,
            'buyer_name'=>$this->buyer_name,
            'owner_name'=>$this->owner_name,
            'agent_name'=>$this->agent_name,
            'selling_price'=>$this->selling_price,
            'booking_amount'=>$this->booking_amount,
            'created_at'=>date('d-m-Y',strtotime($this->created_at)),
            'updated_at'=>date('d-m-Y',strtotime($this->updated_at)),
            'status'=>$this->status,
            'view_url'=>route('sale.bookingDetail.view',$this->id),

        ];
    }
}
