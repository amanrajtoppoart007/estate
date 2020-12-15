<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentBreakDownItem extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function rent_break_down()
    {
        return $this->belongsTo(RentBreakDown::class,"rent_break_down_id","id");
    }
}
