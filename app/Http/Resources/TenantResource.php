<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use ContractStatus as GlobalContractStatus;

class TenantResource extends JsonResource
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
            'broker'=>$this->broker,
            'contract_status'=>$this->contract_status,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'country_name'=>$this->country_name,
            'is_disabled'=>$this->is_disabled,
            'created_at'=>date('d-m-Y',strtotime($this->created_at)),
            'view_url'=>route('tenant.view',$this->id),
            'edit_url'=>route('tenant.edit',$this->id),
        ];
    }
}
