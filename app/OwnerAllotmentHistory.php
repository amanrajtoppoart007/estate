<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerAllotmentHistory extends Model
{
    protected  $guarded = [];

    protected $appends  = ["property_name","flat_number","owner_name"];

    public function property()
    {
        return $this->belongsTo(Property::class,"property_id","id");
    }

    public function owner()
    {
         return $this->belongsTo(Owner::class,"owner_id","id");
    }

    public function property_unit()
    {
         return $this->belongsTo(PropertyUnit::class,"unit_id","id");
    }

    public function getPropertyNameAttribute()
    {
        return $this->property ? $this->property->title:null;
    }
    public function getFlatNumberAttribute()
    {
        return $this->property_unit ? $this->property_unit->flat_number : null;
    }

    public function getOwnerNameAttribute()
    {
        return $this->owner ? $this->owner->name : null;
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
