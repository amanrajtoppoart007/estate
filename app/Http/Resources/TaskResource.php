<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommonResource;
use App\Admin;
class TaskResource extends JsonResource
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
            'task_code'=>$this->task_code,
            'unit_code'=>$this->unit_code,
            'building_name'=>$this->building_name,
            'flat_number'=>$this->flat_number,
            'created_at'=>date('d-m-Y h:i A',strtotime($this->created_at)),
            'deadline'=>date('d-m-Y',strtotime($this->deadline)),
            'task_title'=>$this->task_title,
            'assignee_id'=>$this->assignee_id,
            'priority'=>$this->priority,
            'status'=>$this->status,
            'task_assignments'=>new CommonResource($this->task_assignments),
            'assignee_name'=>$this->assignee_name,
            'assignor_name'=>$this->assignor_name,
            'task_view_url'=>route('task.show',$this->id),
        ];
    }
}
