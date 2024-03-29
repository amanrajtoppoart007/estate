<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(array $array)
 */
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
        return $this->belongsTo(State::class,'state_id','id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
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
        return $this->hasMany(Property::class);
    }
     protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime:Y-m-d h:i A',
    ];

    public function getStateNameAttribute()
    {
         return $this->state ? $this->state->name : null;
    }
    public function getCountryNameAttribute()
    {
        return $this->country ? $this->country->name : null;
    }
}
