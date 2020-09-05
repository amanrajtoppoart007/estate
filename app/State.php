<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded   = [];
    protected $appends   = ['country_name'];

    public function getCountryNameAttribute()
    {
        return $this->country ? $this->country->name : null;
    }
    public function country()
    {
       return $this->belongsTo(Country::class,'country_id','id');
    }
    public function tenants()
    {
        return $this->hasMany(Tenant::class,'state_id','id');
    }

    public function state()
    {
       return $this->belongsTo('App\State');
    }
    public function city()
    {
       return $this->hasMany('App\City');
    }
   public function properties()
   {
      return $this->hasMany('App\Property','state_id','id');
   }
   public function owners()
   {
       return $this->hasMany(Owner::class);
   }
   public function agents()
   {
       return $this->hasMany(Agent::class);
   }
   public function buyers()
   {
       return $this->hasMany(Buyer::class);
   }
   public function employees()
   {
       return $this->hasMany(Employee::class);
   }
}
