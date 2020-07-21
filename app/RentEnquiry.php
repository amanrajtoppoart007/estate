<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentEnquiry extends Model
{
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
}
