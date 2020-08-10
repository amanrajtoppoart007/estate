<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
             'name'=>$this->name,
             'email'=>$this->email,
             'mobile'=>$this->mobile,
             'is_disabled'=>$this->is_disabled,
             'edit_url'=> $this->edit_url,
             'view_url'=> $this->view_url,
             'owner_type'=> $this->owner_type,
             'created_at'=>date('d-m-Y',strtotime($this->created_at)),
             'unit_allotment_url'=>$this->when(($this->owner_type=="flat_owner"), function () {
                      return route("owner.init.allot.property.unit",$this->id) ;
              })
        ];
    }
}
