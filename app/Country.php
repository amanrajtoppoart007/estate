<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $guarded    = [];
    public function states()
    {
        return $this->hasMany(State::class,'country_id','id');
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function properties()
    {
        return $this->hasMany('App\Property');
    }
    public function tenants()
    {
        return $this->hasMany('App\Tenant');
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

    public function rent_enquiries()
    {
        return $this->hasMany(RentEnquiry::class,"country_code","code");
    }

    public function sales_enquiries()
    {
        return $this->hasMany(SalesEnquiry::class,"country_code","code");
    }
}
