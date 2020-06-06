<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
   protected $table    = 'property_types';
   protected $fillable = ['title','admin_id','is_disabled'];
    function property()
    {
        return $this->belongsTo('App\Property','type','id');
    }
}
