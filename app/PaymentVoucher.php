<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentVoucher extends Model
{
    public function item()
    {
        return $this->hasMany(PaymentData::class,"receipt_id","id");
    }
    public function property()
    {
        return $this->belongsTo(Property::class,"property_id","id");
    }
    public function unit()
    {
        return $this->belongsTo(PropertyUnit::class,"unit_id","id");
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class,"user_id","id");
    }
}
