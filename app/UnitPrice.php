<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitPrice extends Model
{
    protected $guarded = [];

    public function property_unit()
    {
        return $this->belongsTo(PropertyUnit::class,'property_unit_id','id');
    }
}
