<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table    = "departments";
    public $timestamps  = false;
    protected $guarded  = [];
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
