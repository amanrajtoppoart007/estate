<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $guarded = [];

    public function properties()
   {
      return $this->hasMany('App\Property','agent_id','id');
   }
    public function property_units()
   {
      return $this->hasMany('App\PropertyUnit','agent_id','id');
   }

   public function property_sales()
   {
      return $this->hasMany('App\PropertySale');
   }

   public function admin()
   {
       return $this->belongsTo(Admin::class,'admin_id','id');
   }
}
