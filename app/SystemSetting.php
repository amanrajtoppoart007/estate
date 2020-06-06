<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='system_settings';
  
    

    protected $fillable = [
        'name', 'value', 'admin_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    
    
 



}

