<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
   use Notifiable;
   protected $guarded = [];
   protected $appends = ['edit_url','view_url'];


   public function documents()
   {
       return $this->morphMany(Document::class,'archive');
   }

   public function authorised_person()
    {
        return $this->morphOne(AuthorisedPerson::class,"authority");
    }

   public function getEditUrlAttribute()
   {
       if($this->owner_type=="developer")
       {
           return route('developer.edit',$this->id);
       }
       else
       {
           return route('owner.edit',$this->id);
       }
   }


   public function getViewUrlAttribute()
   {
       if($this->owner_type==="developer")
       {
           return route('developer.view',$this->id);
       }
       else
       {
           return route('owner.view',$this->id);
       }
   }

   public function properties()
   {
      return $this->hasMany('App\Property','owner_id','id');
   }

   public function property_sales()
   {
      return $this->hasMany('App\PropertySale','owner_id','id');
   }
   public function property_units()
   {
      return $this->hasMany('App\PropertyUnit','owner_id','id');
   }
   public function invoices()
   {
      return $this->morphMany('App\Invoice', 'party');
   }
   public function maintenance_work()
   {
     return $this->morphMany(MaintenanceWork::class, 'applicant');
   }

    public function owner_allotment_history()
    {
        return $this->hasMany(OwnerAllotmentHistory::class,"owner_id","id");
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

    protected $hidden = [
        'password', 'remember_token',
    ];
}
