<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentBreakDown extends Model
{
    protected $guarded = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,"tenant_id","id");
    }

    public function tenancy_contract()
    {
        return $this->hasOne(TenancyContract::class,"breakdown_id","id");
    }

    public function property()
    {
        return $this->belongsTo(Property::class,"property_id","id");
    }
    public function unit()
    {
        return $this->belongsTo(PropertyUnit::class,"unit_id","id");
    }
    public function unit_allotment()
    {
        return $this->belongsTo(PropertyUnitAllotment::class,"unit_allotment_id","id");
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
        return $this->hasOne(RentBreakDownItem::class,"rent_break_down_id","id");
    }

    public function rent_installments()
    {
        return $this->hasMany(RentInstallment::class,"rent_breakdown_id","id");
    }
}
