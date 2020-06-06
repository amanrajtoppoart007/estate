<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyUnitType extends Model
{
    protected $table   = 'property_unit_types';
    protected $guarded = [];
    public function property()
    {
       return $this->belongsTo('App\Property');
    }
    
    public function property_sales()
   {
      return $this->hasMany('App\PropertySale');
   }

    public function propertyUnits()
    {
        return $this->hasMany('App\PropertyUnit','property_unit_type_id','id');
    }
    public function property_unit_allotment()
    {
        return $this->hasMany('App\PropertyUnitAllotment','property_unit_type_id','id');
    }
}
