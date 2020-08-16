<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentBreakDown extends Model
{
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class,"property_id","id");
    }
    public function unit()
    {
        return $this->belongsTo(PropertyUnit::class,"unit_id","id");
    }
    public function city()
    {
        return $this->belongsTo(City::class,"city_id","id");
    }
    public function rent_enquiry()
    {
        return $this->belongsTo(RentEnquiry::class,"rent_enquiry_id","id");
    }
    public function rent_break_down_items()
    {
        return $this->hasMany(RentBreakDownItem::class,"rent_break_down_id","id");
    }
}
