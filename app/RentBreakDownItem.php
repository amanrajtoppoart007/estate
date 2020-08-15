<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentBreakDownItem extends Model
{
    protected $guarded = [];
    public function rent_break_down()
    {
        return $this->belongsTo(RentBreakDown::class,"rent_break_down_id","id");
    }
}
