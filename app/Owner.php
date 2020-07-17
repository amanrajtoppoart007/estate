<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
   use Notifiable;
   protected $guarded = [];
   protected $appends = ['edit_url'];

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

   public function auth_person()
   {
       return $this->hasOne(OwnerAuthPerson::class);
   }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
