<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded    = [];
    protected $appends    = ['state_name','country_name'];

    public function rent_breakdown()
    {
        return $this->hasMany(RentBreakDown::class,"city_id","id");
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class,'city_id','id');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
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

    public function properties()
    {
        return $this->hasMany('App\Property');
    }
     protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime:Y-m-d h:i A',
    ];

    public function getStateNameAttribute()
    {
         return  $this->state->name;
    }
    public function getCountryNameAttribute()
    {
        return $this->country->name;
    }
}
