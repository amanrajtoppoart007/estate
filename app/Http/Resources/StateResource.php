<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            'row_id' => 'state_row_'.$this->id,
            'id' => $this->id,
            'name' => $this->name,
            'image' => asset($this->image),
             'country' => (($this->country->first())['name'])?(($this->country->first())['name']):'',
            'is_disabled' => $this->is_disabled,
            'created_at' => date('Y-m-d h:i A',strtotime($this->created_at)),
            'updated_at' => date('Y-m-d h:i A',strtotime($this->updated_at)),
        ];
    }
}
