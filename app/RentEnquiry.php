<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentEnquiry extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $appends = ['create_tenant_url','country_name'];

    public function getCreateTenantUrlAttribute()
    {
        return route('tenant.create',['request_id'=>base64_encode($this->id)]);
    }
    public function getCountryNameAttribute()
    {
        return $this->country ? $this->country->name: null;
    }
    public function country()
    {
        return $this->belongsTo(Country::class,"country_code","code");
    }
    public function rent_breakdown()
    {
        return $this->hasMany(RentBreakDown::class,"rent_inquiry_id","id");
    }
}
