<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table    = 'property_features';
    public $timestamps  = TRUE;
    protected $fillable = ['title', 'is_disabled', 'admin_id'];
}
