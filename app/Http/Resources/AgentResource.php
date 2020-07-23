<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
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
             'agent_type'=>$this->agent_type,
             'edit_url'=> route('agent.edit',$this->id),
             'created_at'=>date('d-m-Y',strtotime($this->created_at)),
        ];
    }
}
