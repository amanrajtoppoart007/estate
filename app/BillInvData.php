<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillInvData extends Model
{
    protected $table = 'bill_inv_data';
    protected $guarded = [];
    
    public function unit()
    {
        return $this->belongsTo('App\PropertyUnit', 'unit_id','id');
    }
    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id','id');
    }
}
