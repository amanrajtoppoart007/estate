<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'row_id' => 'state_row_'.$this->id,
            'id' => $this->id,
            'name' => $this->name,
            'image' => asset($this->image),
             'country' =>$this->country_name,
            'is_disabled' => $this->is_disabled,
            'created_at' => date('Y-m-d h:i A',strtotime($this->created_at)),
            'updated_at' => date('Y-m-d h:i A',strtotime($this->updated_at)),
        ];
    }
}
