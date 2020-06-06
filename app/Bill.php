<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];
    public function party()
    {
        return $this->morphTo();
    }
}
