<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerAuthPerson extends Model
{
    protected $table = 'owner_auth_people';
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
