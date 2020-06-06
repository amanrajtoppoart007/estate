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
        return $this->hasMany('App\TenantDocument','tenant_id','id');
    }
    /******tenant profile  **********/
    public function profile()
    {
         return $this->hasOne('App\TenantProfile','tenant_id','id');
    }
     /******tenant relations  **********/
    public function relations()
    {
         return $this->hasMany('App\TenantRelation');
    }
    public function country()
    {
         return $this->belongsTo('App\Country','country_id','id');
    }
     public function invoices()
     {
          return $this->morphMany('App\Invoice', 'party');
     }
     public function maintenance_work()
     {
        return $this->morphMany(MaintenanceWork::class, 'applicant');
     }

      protected $hidden = [
        'password', 'remember_token',
    ];
}
