<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantRemove extends Model
{
    protected $table = 'tenant_remove';
    protected $fillable   = ['tenant_id', 'unit', 'remark', 'requested_by', 'requester_type', 'type', 'admin_id', 'admin_type', 'status',];
  
}
