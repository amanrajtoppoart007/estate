<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceWork extends Model
{
    protected $guarded = [];

    public function property()
    {
       return $this->belongsTo(Property::class);
    }
    public function property_unit()
    {
       return $this->belongsTo(PropertyUnit::class);
    }

    public function applicant()
    {
        return $this->morphTo();
    }
}
