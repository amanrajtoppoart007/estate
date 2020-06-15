<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceWorkResource extends JsonResource
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
            'id' => $this->id,
            'work_order_no'=>$this->work_order_no,
            'category' => $this->category,
            'appointment_date' => date('d-m-Y', strtotime($this->appointment_date)),
            'appointment_time_from' => date('h:i A', strtotime($this->appointment_time_from)),
            'appointment_time_to' => date('h:i A', strtotime($this->appointment_time_to)),
            'status'=>$this->status,
            'view_url'=>route('maintenance.view',$this->id),
            'tenant_view_url'=>route('tenant.maintenance.view',$this->id),
            'owner_view_url'=>route('owner.maintenance.view',$this->id)
        ];
    }
}
