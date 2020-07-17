<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesEnquiry extends Model
{
     protected $guarded = [];
     protected $appends = ['create_buyer_url'];

    public function getCreateBuyerUrlAttribute()
    {
        return route('buyer.create',['request_id'=>base64_encode($this->id)]);
    }

}
