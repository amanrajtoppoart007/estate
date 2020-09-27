<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentEnquiry extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $appends = ['create_tenant_url','country_name','view_rent_breakdown','edit_url','view_url','create_breakdown_url'];

    public function getEditUrlAttribute()
    {
        return route("edit.rentEnquiry",$this->id);
    }

    public function getCreateBreakdownUrlAttribute()
    {
        return route("rentEnquiry.create.breakdown",["id"=>$this->id]);
    }

    public function getViewUrlAttribute()
    {
        return route("view.rentEnquiry",$this->id);
    }

    public function getCreateTenantUrlAttribute()
    {
        return route('tenant.create',['request_id'=>base64_encode($this->id)]);
    }
    public function getViewRentBreakdownAttribute()
    {
        return $this->rent_breakdown ? route('view.rent.breakdown',$this->rent_breakdown->id): null;
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
        return $this->hasOne(RentBreakDown::class,"rent_enquiry_id","id");
    }
    protected $casts = [
        'created_at' => 'datetime:d:m:Y H:i:s',
        'updated_at' => 'datetime:d:m:Y H:i:s',
    ];
}
