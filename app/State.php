<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable   = ['admin_id','code','name', 'image','country_id','is_disabled',];
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
}
