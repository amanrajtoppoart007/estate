<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarySheetDetail extends Model
{
    protected $guarded = [];
    public function salary_sheet()
    {
        return $this->belongsTo('App\SalarySheet');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
