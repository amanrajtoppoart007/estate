<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenancyContractResource extends JsonResource
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
          "id"=>$this->id,
          "flat_number"=>$this->flat_number,
          "owner_name"=>$this->owner_name,
          "breakdown_url"=>$this->breakdown_url,
          "signature_date"=>$this->signature_date,
          "effective_from"=>$this->effective_from,
          "effective_upto"=>$this->effective_from,
        ];
    }
}
