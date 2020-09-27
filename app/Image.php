<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded    = [];
    public    $timestamps = false;
    protected $primaryKey = 'id';
    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
