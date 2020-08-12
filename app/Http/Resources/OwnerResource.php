<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
             'id'=>$this->id,
             'name'=>$this->name,
             'email'=>$this->email,
             'mobile'=>$this->mobile,
             'is_disabled'=>$this->is_disabled,
             'edit_url'=> $this->edit_url,
             'view_url'=> $this->view_url,
             'owner_type'=> $this->owner_type,
             'country_id'=> $this->country_id,
             'state_id'=> $this->state_id,
             'city_id'=> $this->city_id,
             'created_at'=>date('d-m-Y',strtotime($this->created_at)),
             'unit_allotment_url'=>$this->when(($this->owner_type=="flat_owner"), function () {
                      return route("owner.init.allot.property.unit",$this->id) ;
              })
        ];
    }
}
