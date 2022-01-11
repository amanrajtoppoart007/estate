<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AuthorisedPerson extends Authenticatable
{
    use SoftDeletes;
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
