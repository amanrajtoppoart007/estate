<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceWorkProgress extends Model
{
    protected $guarded = [];

    public function maintenance_work()
    {
        return $this->belongsTo(MaintenanceWork::class,'maintenance_work_order_id','id');
    }
}
