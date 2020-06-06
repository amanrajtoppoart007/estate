<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyUnitAllotment extends Model
{
    protected $table   = 'property_unit_allotment';
    protected $guarded = [];

    public function property_unit()
    {
        return $this->morphOne('App\PropertyUnit', 'allotment');
    }
    public function property()
    {
        return $this->belongsTo('App\Property','property_id','id');
    }
    public function property_unit_type()
    {
        return $this->belongsTo('App\PropertyUnitType','property_unit_type_id','id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }
    
    public function rent_installments()
    {
        return $this->hasMany('App\RentInstallment');
    }

    public function unit()
    {
        return $this->belongsTo(PropertyUnit::class,'unit_id','id');
    }
}
