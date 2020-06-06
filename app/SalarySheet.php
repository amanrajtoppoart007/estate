<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarySheet extends Model
{
    protected $guarded = [];

    public function salary_sheet_details()
    {
        return $this->hasMany('App\SalarySheetDetail','sheet_id','id');
    }
}
