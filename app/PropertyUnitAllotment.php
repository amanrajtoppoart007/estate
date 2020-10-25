<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyUnitAllotment extends Model
{
    protected $table      = "property_unit_allotment";
    protected $primaryKey = "id";
    protected $guarded    = [];

    public function property_unit()
    {
        return $this->morphOne(PropertyUnit::class, 'allotment');
    }
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
    public function property_unit_type()
    {
        return $this->belongsTo(PropertyUnitType::class,'property_unit_type_id','id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }

    public function rent_installments()
    {
        return $this->hasMany(RentInstallment::class);
    }

    public function unit()
    {
        return $this->belongsTo(PropertyUnit::class,'unit_id','id');
    }

    public function breakdown()
    {
        return $this->hasOne(RentBreakDown::class,"unit_allotment_id","id");
    }
}
