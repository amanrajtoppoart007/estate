<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentInstallment extends Model
{
    protected $table = 'rent_installments';
    protected $guarded = [];
    protected $dates = ['expected_date','paid_date','created_at','updated_at'];
    public function property_unit_allotment()
    {
        return $this->belongsTo('App\PropertyUnitAllotment');
    }
}
