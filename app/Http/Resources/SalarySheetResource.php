<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalarySheetResource extends JsonResource
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
            'row_id'=> 'row_id_'.$this->id,
            'id'=> $this->id,
            'sheet_no' => $this->sheet_no,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'edit_url' => route('salary.edit',$this->id),
            'wps_url' => route('salary.wps-sheet.show',$this->id),
            'created_at' => date('Y-m-d h:i A',strtotime($this->created_at)),
            'updated_at' => date('Y-m-d h:i A',strtotime($this->updated_at)),
        ];
    }
}
