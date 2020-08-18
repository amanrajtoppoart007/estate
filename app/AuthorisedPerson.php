<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorisedPerson extends Model
{
    protected $guarded = [];

    public function authority()
    {
        return $this->morphTo();
    }

    public function documents()
    {
        return $this->morphMany(Document::class,'archive');
    }
}
