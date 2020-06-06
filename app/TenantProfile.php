<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TenantProfile extends Model
{
    protected $table='tenant_profile';
    protected $guarded = [];
    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }
}

