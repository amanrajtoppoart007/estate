<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTimeline extends Model
{
    protected $guarded = [];

    public function bills(){
        return $this->belongsTo('App\Bill','bill_id','id');
    }
    public function invoices(){
        return $this->belongsTo('App\Invoice','invoice_id','id');
    }
}
