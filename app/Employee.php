<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    protected $appends = ['department_name','job_title'];
    public function getDepartmentNameAttribute()
    {
        return $this->department->name;
    }
    public function getJobTitleAttribute()
    {
        return $this->designation->name;
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }
    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
    public function salary_sheet_details()
    {
        return $this->hasMany('App\SalarySheetDetail');
    }
}
