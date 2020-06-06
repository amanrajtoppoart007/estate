<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingRequestResource extends JsonResource
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
            'row_id' => 'booking_request_row_'.$this->id,
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'property_id' => $this->property_id,
            'property' => $this->property,
            'status' => $this->status,
            'created_at' => date('Y-m-d h:i A',strtotime($this->created_at)),
            'updated_at' => date('Y-m-d h:i A',strtotime($this->updated_at)),
        ];
    }
}
