<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table      = 'countries';
    public $timestamps    = false;
    protected $guarded    = [];
    public function states()
    {
        return $this->hasMany('App\State');
    }
    public function cities()
    {
        return $this->hasMany('App\City');
    }
    public function properties()
    {
        return $this->hasMany('App\Property');
    }
    public function tenants()
    {
        return $this->hasMany('App\Tenant');
    }

    public function rent_enquiries()
    {
        return $this->hasMany(RentEnquiry::class,"country_code","code");
    }
}
