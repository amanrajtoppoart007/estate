<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $guarded = [];

    public function property_sales()
   {
      return $this->hasMany('App\PropertySale');
   }
   public function invoices()
   {
      return $this->morphMany('App\Invoice', 'party');
   }

   public function country()
    {
        return $this->belongsTo(Country::class,"country_id","id");
    }

    public function state()
    {
        return $this->belongsTo(State::class,"state_id","id");
    }

    public function city()
    {
        return $this->belongsTo(City::class,"city_id","id");
    }
}
