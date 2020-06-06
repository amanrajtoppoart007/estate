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
}
