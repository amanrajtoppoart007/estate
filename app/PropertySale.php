<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertySale extends Model
{
    protected $table   = 'property_sales';
    protected $guarded = [];
    protected $appends = ['property_title','buyer_name','owner_name','agent_name','unit_code'];
    
    public function property_unit_type()
    {
        return $this->belongsTo('App\PropertyUnitType','property_id','property_id');
    }
    public function property_unit()
    {
        return $this->morphOne('App\PropertyUnit', 'allotment');
    }

    public function property()
    {
       return $this->belongsTo('App\Property');
    }

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }

    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

   /************custom attribute function **************/
   public function getUnitCodeAttribute()
   {
       return $this->property_unit->unitcode;
   }

   public function getPropertyTitleAttribute()
   {
       return ucwords($this->property->title);
   }
   public function getBuyerNameAttribute()
   {
       return $this->buyer->name;
   }

   public function getOwnerNameAttribute()
   {
       return ucwords($this->owner->name);
   }

   public function getAgentNameAttribute()
   {
       return $this->agent->name;
   }
   protected $casts = [
    'updated_at' => 'datetime:d-m-Y',
    'created_at' => 'datetime:d-m-Y',
    ];
}
