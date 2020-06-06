<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table   = "designations";
    public $timestamps = false;
    protected $guarded = [];
    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
