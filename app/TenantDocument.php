<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantDocument extends Model
{
    protected $guarded = [];
    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }
}
