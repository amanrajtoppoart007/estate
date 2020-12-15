<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentInstallment extends Model
{
    use SoftDeletes;
    protected $table = 'rent_installments';
    protected $guarded = [];
    protected $dates = ['cheque_date','expected_date','paid_date','created_at','updated_at'];
    public function property_unit_allotment()
    {
        return $this->belongsTo('App\PropertyUnitAllotment');
    }

    public function rent_breakdown()
    {
        return $this->belongsTo(RentBreakDown::class,"rent_breakdown_id","id");
    }
}
