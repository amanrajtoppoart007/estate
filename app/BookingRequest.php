<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    protected $table      = 'booking_request';
    protected $guarded    = [];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
