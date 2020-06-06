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
    public function assigned_users()
    {
        return $this->belongsTo('App\Admin');
    }
}
