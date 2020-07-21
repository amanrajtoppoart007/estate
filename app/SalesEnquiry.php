<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesEnquiry extends Model
{
     protected $guarded = [];
     protected $appends = ['create_buyer_url','country_name'];

    public function getCreateBuyerUrlAttribute()
    {
        return route('buyer.create',['request_id'=>base64_encode($this->id)]);
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
