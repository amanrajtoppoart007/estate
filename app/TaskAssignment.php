<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    protected $table   = 'task_assignments';
    protected $guarded = [];
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
    public function assignees()
    {
        return $this->belongsTo(Employee::class,"assignee_id","id");
    }
}
