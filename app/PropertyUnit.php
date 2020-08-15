<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyUnit extends Model
{
    protected $table   = 'property_units';
    protected $guarded = [];
    protected $appends = ['owner_name','owner_mobile', 'client_name','client_id','lease_start','lease_end','collection_route','unit_title','broker','allotment_price'];

    public function unit_price()
    {
        return $this->hasOne(UnitPrice::class,'property_unit_id','id');
    }
    public function rent_breakdown()
    {
        return $this->hasMany(RentBreakDown::class,"unit_id","id");
    }

    public function getAllotmentPriceAttribute()
    {
        $unit_price = 0.00;
        if($this->allotment)
        {
             if($this->allotment->rent_amount)
             {
                 $unit_price =  $this->allotment->rent_amount;
             }
             if($this->allotment->selling_price)
             {
                 $unit_price = $this->allotment->selling_price;
             }

        }
        else {
            $unit_price = 00;//$this->unit_price ? $this->unit_price->unit_price:0.00;
        }
        return $unit_price;
    }

    public function getBrokerAttribute()
    {
        return $this->agent ? $this->agent->name:null;
    }
    public function property_sales()
    {
        return $this->hasMany('App\PropertySale','unit_id','id');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function propertyUnitType()
    {
       return $this->belongsTo('App\PropertyUnitType');
    }

    public function property_unit_allotment()
    {
        return $this->hasMany('App\PropertyUnitAllotment','unit_id','id');
    }
    public function task()
    {
        return $this->hasMany('App\Task');
    }
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }


    public function getUnitTitleAttribute()
    {
        return $this->propertyUnitType ? $this->propertyUnitType->title: null;
    }

    public function getOwnerNameAttribute()
    {
        return $this->owner?$this->owner->name:'';
    }
    public function getClientIdAttribute()
    {
        $id= null;
       if(!empty($this->allotment))
        {
            if ($this->allotment_type == 'sale')
            {
                $id= $this->allotment->buyer_id;
            }
            else if ($this->allotment_type == 'rent')
            {
                $id= $this->allotment->tenant_id;
            }
        }
       return $id;
    }
    public function getCollectionRouteAttribute()
    {
        $route = null;
       if(!empty($this->allotment))
        {
            if ($this->allotment_type == 'sale')
            {
                $route = route('sale.detail',['id'=>$this->client_id,'allotmentId'=>$this->allotment->id]);
            }
            else if ($this->allotment_type == 'rent')
            {
                $route = route('allotment.detail',['id'=>$this->client_id,'allotmentId'=>$this->allotment->id]);
            }
        }
       return $route;
    }
    public function getOwnerMobileAttribute()
    {
        return $this->owner?$this->owner->mobile:'';
    }
    public function getClientNameAttribute()
    {
        if(!empty($this->allotment))
        {
            if ($this->allotment_type == 'sale')
            {
                return pluck_single_value('buyers', 'id', $this->allotment->buyer_id, 'name');
            }
            else if ($this->allotment_type == 'rent')
            {
                return pluck_single_value('tenants', 'id', $this->allotment->tenant_id, 'name');
            }
            else
            {
                return '';
            }
        }
        return '';

    }
    public function getLeaseStartAttribute()
    {
        $date= null;
          if(!empty($this->allotment))
        {
            if ($this->allotment_type == 'sale')
            {
                $date =  $this->allotment->update_at;
            }
            else if ($this->allotment_type == 'rent')
            {
                $date =  $this->allotment->lease_start;
            }

        }
        return $date ;

    }
    public function getLeaseEndAttribute()
    {
        $date= null;
          if(!empty($this->allotment))
        {
            if ($this->allotment_type == 'sale')
            {
                $date =  null;
            }
            else if ($this->allotment_type == 'rent')
            {
                $date =  $this->allotment->lease_end;
            }

        }
        return $date;

    }

    // unit allotment relationship if rent or sales
    public function allotment()
    {
        return $this->morphTo();
    }

    public function rental_allotment()
    {
          return $this->hasMany(PropertyUnitAllotment::class,'unit_id','id');
    }

    public function owner_allotment_history()
    {
        return $this->hasMany(OwnerAllotmentHistory::class,"unit_id","id");
    }
}
