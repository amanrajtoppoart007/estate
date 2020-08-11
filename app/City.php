<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table      = 'cities';
    protected $primaryKey = 'id';
    protected $guarded    = [];
    protected $appends    = ['state_name','country_name'];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function owners()
   {
       return $this->hasMany(Owner::class);
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
