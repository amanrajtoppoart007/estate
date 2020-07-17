<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentEnquiry extends Model
{
    protected $guarded = [];

    protected $appends = ['create_tenant_url'];

    public function getCreateTenantUrlAttribute()
    {
        return route('tenant.create',['request_id'=>base64_encode($this->id)]);
    }
}
