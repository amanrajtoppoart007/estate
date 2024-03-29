<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $guarded = [];

    public function authorised_person()
    {
        return $this->morphOne(AuthorisedPerson::class,"authority");
    }

    public function documents()
    {
        return $this->morphMany(Document::class,"archive");
    }

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
