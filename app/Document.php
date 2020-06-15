<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function referrer()
    {
        return $this->morphTo();
    }
}
