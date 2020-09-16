<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $store)
 * @method static update(array $update)
 */
class Favorite extends Model
{
    use SoftDeletes;
    protected $fillable = ["user_id","property_id","unit_id","deleted_at"];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime:Y-m-d h:i A',
    ];
}
