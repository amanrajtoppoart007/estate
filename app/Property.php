<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table      = 'properties';
    protected $primaryKey = 'id';
    protected  $guarded   = [];
    protected $appends    = ['full_address','primary_image','total_units'];

     public function getTotalUnitsAttribute()
     {
         return $this->property_units->count();
     }
     public function getPrimaryImageAttribute()
     {
         return ($this->images)?($this->images)[0]->image_thumb:null;
     }
    public function property_sales()
   {
      return $this->hasMany('App\PropertySale');
   }
   
    public function getFullAddressAttribute()
    {
        return $this->address.','.$this->state->name;
    }
    /* ********Relation between property and ownder model*********** */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
    /* ********Relation between property and agent model*********** */
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
    /* ********Relation between property and property unit model*********** */
    public function property_units()
    {           
      return $this->hasMany('App\PropertyUnit','property_id','id');
    }
    public function propertyUnitTypes()
    {
        return $this->hasMany('App\PropertyUnitType','property_id','id');
    }
    public function images()
    {
        return $this->hasMany('App\Image','property_id','id');
    }
    public function updateProperty($input, $id)
    {
        return  Property::where('id', $id)->update($input);
    }
    public function propertyType()
    {
        return $this->hasOne('App\PropertyType','id','type');
    }
    public function city()
    {
        return $this->belongsTo('App\City','city_id','id');
    }
    public function state()
    {
        return $this->belongsTo('App\State','state_id','id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country','country_id','id');
    }
    public function bookingRequest()
    {
        return $this->hasMany('App\BookingRequest','property_id','id');
    }
    public function allotment()
    {
        return $this->hasMany('App\PropertyUnitAllotment');
    }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime:Y-m-d h:i A',
    ];
}
