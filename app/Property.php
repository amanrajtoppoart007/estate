<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table      = 'properties';
    protected $primaryKey = 'id';
    protected $guarded    = [];
    protected $appends    = ['full_address','primary_image','total_units','city_name','country_name'];

    public function rent_breakdown()
    {
        return $this->hasMany(RentBreakDown::class,"property_id","id");
    }

    public function getCountryNameAttribute()
    {
        return $this->country ? $this->country->name : null;
    }

    public function getCityNameAttribute()
    {
       return  $this->city ? $this->city->name : null;
    }


     public function getTotalUnitsAttribute()
     {
         return $this->property_units ? $this->property_units->count() : 0;
     }
     public function getPrimaryImageAttribute()
     {
         $image = null;
         if(!$this->images->isEmpty())
         {
              foreach($this->images as $image)
              {
                  $image = asset($image->image_thumb);
              }
         }
         return $image;
     }
    public function property_sales()
    {
      return $this->hasMany(PropertySale::class);
    }

    public function getFullAddressAttribute()
    {
        return $this->address.','. ($this->state ? $this->state->name:null);
    }
    /* ********Relation between property and ownder model*********** */
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    /* ********Relation between property and agent model*********** */
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    /* ********Relation between property and property unit model*********** */
    public function property_units()
    {
      return $this->hasMany(PropertyUnit::class,'property_id','id');
    }
    public function propertyUnitTypes()
    {
        return $this->hasMany(PropertyUnitType::class,'property_id','id');
    }
    public function images()
    {
        return $this->hasMany(Image::class,'property_id','id');
    }
    public function updateProperty($input, $id)
    {
        return  Property::where('id', $id)->update($input);
    }
    public function propertyType()
    {
        return $this->hasOne(PropertyType::class,'id','type');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function bookingRequest()
    {
        return $this->hasMany(BookingRequest::class,'property_id','id');
    }
    public function allotment()
    {
        return $this->hasMany(PropertyUnitAllotment::class);
    }
    public function owner_allotment_history()
    {
        return $this->hasMany(OwnerAllotmentHistory::class,"property_id","id");
    }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime:Y-m-d h:i A',
    ];
}
