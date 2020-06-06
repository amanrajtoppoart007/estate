<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
             'status'=>$this->status,
             'department_name'=>$this->department_name,
             'job_title'=>$this->job_title,
             'edit_url'=> route('employee.edit',$this->id),
             'created_at'=>date('d-m-Y',strtotime($this->created_at)),
        ];
    }
}
