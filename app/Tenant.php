<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Tenant extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    protected $appends = ['country_name'];

    public function getCountryNameAttribute()
    {
         return ($this->country)?$this->country->name:null;
    }
    /******tenant property relation **********/
    public function allotment()
    {
         return $this->hasMany(PropertyUnitAllotment::class,'tenant_id','id');
    }
    /******tenant documents  **********/
    public function documents()
    {
        return $this->morphMany(Document::class,'archive');
    }

     /******tenant relations  **********/
    public function relations()
    {
         return $this->hasMany(TenantRelation::class);
    }
    public function country()
    {
         return $this->belongsTo(Country::class,'country_id','id');
    }
    public function state()
    {
         return $this->belongsTo(State::class,'state_id','id');
    }
    public function city()
    {
         return $this->belongsTo(City::class,'city_id','id');
    }
     public function invoices()
     {
          return $this->morphMany(Invoice::class, 'party');
     }
     public function maintenance_work()
     {
        return $this->morphMany(MaintenanceWork::class, 'applicant');
     }

      protected $hidden = [
        'password', 'remember_token',
    ];
}
