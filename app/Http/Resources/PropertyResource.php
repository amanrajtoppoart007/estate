<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'row_id' => 'property_row_'.$this->id,
            'id' => $this->id,
            'title' => $this->title,
            'property_for' => $this->prop_for,
            'view_count' => $this->view_count,
            'total_units'=>$this->total_units,
            'edit_url' => route('property.edit',$this->id),
            'view_url' => route('property.view',$this->id),
            'is_disabled' => $this->is_disabled,
            'active_text' => ($this->is_disabled)?'In Active':'Active',
            'primary_image' => (($this->images->first())['image_thumb'])?(asset(($this->images->first())['image_thumb'])):asset('theme/default/images/thumbnail/01.jpg'),
            'address'=> $this->full_address,
            'created_at' => date('Y-m-d h:i A',strtotime($this->created_at)),
            'updated_at' => date('Y-m-d h:i A',strtotime($this->updated_at)),
        ];
    }
}
