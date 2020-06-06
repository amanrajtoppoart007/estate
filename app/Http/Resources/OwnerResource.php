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
             'edit_url'=> route('owner.edit',$this->id),
             'created_at'=>date('d-m-Y',strtotime($this->created_at)),
        ];
    }
}
