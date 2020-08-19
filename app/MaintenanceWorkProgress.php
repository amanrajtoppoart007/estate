<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceWorkProgress extends Model
{
    protected $guarded = [];
    protected $table   = "maintenance_work_progresses";
    public function maintenance_work()
    {
        return $this->belongsTo(MaintenanceWork::class);
    }
}



