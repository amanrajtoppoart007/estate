<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected  $guarded   = [];

    protected $appends = ['assignor_name', 'assignee_name','unit_code','flat_number','building_name'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime:Y-m-d h:i A',
    ];
    public function property_unit()
    {
        return $this->belongsTo('App\PropertyUnit');
    }
    public function getBuildingNameAttribute()
    {
          return $this->property_unit? $this->property_unit->property->title : null;
    }
    public function getUnitCodeAttribute()
   {
       return $this->property_unit? $this->property_unit->unitcode : null;
   }
   public function getFlatNumberAttribute()
   {
       return $this->property_unit? $this->property_unit->flat_house_no : null;
   }
    public function assignor()
    {
        return $this->belongsTo('App\Admin');
    }
    public function assignee()
    {
        return $this->belongsTo('App\Admin');
    }
    public function task_assignments()
    {
        return $this->hasMany('App\TaskAssignment','task_id','id');
    }
    public function getAssigneeNameAttribute()
    {
        return $this->assignee->name;
    }
    public function getAssignorNameAttribute()
    {
        return $this->assignor->name;
    }

}
