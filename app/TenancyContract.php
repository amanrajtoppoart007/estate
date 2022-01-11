<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenancyContract extends Model
{
    protected $guarded = [];

    protected $appends = ["flat_number","owner_name","breakdown_url","contract_doc_url"];

    public function getFlatNumberAttribute()
    {
        return $this->unit->flat_number ??null;
    }

    public function getContractDocUrlAttribute()
    {
        if(!empty($this->contract))
        {
           return $this->contract->file_url;
        }
        return false;
    }

    public function getOwnerNameAttribute()
    {
        return $this->owner->name ??null;
    }
    public function getBreakdownUrlAttribute()
    {
        return route("tenant.breakdown.view",$this->breakdown->id);
    }

    public function breakdown()
    {
        return $this->belongsTo(RentBreakDown::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class,"tenant_id","id");
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,"owner_id","id");
    }
    public function unit()
    {
        return $this->belongsTo(PropertyUnit::class,"unit_id","id");
    }

    public function contract()
    {
         return $this->morphOne(Document::class,'archive');
    }
}
