<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthorisedPerson extends Model
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
