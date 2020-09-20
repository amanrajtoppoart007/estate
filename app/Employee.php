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
        return $this->belongsTo(Department::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function salary_sheet_details()
    {
        return $this->hasMany(SalarySheetDetail::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id", "id");
    }

    public function state()
    {
        return $this->belongsTo(State::class, "state_id", "id");
    }

    public function city()
    {
        return $this->belongsTo(City::class, "city_id", "id");
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,"assignor_id","id");
    }

    public function assigned_task()
    {
        return $this->hasMany(TaskAssignment::class,'assignee_id','id');
    }
}
