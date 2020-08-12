<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded   = [];
    public function country()
    {
       return $this->belongsTo('App\Country');
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
