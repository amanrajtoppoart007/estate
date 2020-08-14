<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BuyerResource extends JsonResource
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
            'rowId' => 'row_id_'.$this->id,
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'edit_url'=>route('buyer.edit',$this->id),
            'view_url'=>route('buyer.view',$this->id),
            'status'=>$this->status,
            'country'=>$this->country,
            'city'=>$this->city,
            'state'=>$this->state,
            'address'=>$this->address,
            'created_at'=>date('d-m-Y',strtotime($this->created_at)),
            'updated_at'=>date('d-m-Y',strtotime($this->updated_at)),
            'buy_property_url'=>route('buyer.sale.property',$this->id),

        ];
    }
}
