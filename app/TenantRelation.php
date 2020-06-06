<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantRelation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table    = 'tenant_relations';
    protected $guarded  = [];

    public function tenant()
   {
       return $this->belongsTo('App\Tenant');
   }
}
