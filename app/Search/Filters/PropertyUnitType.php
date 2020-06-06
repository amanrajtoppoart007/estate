<?php

namespace App\Search\Filters;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;

class PropertyUnitType
{
    public static function radius(Builder $builder, $value)
    {
        if(!empty($value))
        {
            $request   = new Request();
            return    $builder->whereHas('property',function($query) use($request){
            $latitude  = $request->latitude;
            $longitude = $request->longitude;
            $distance  = ($request->distance)?$request->distance:10;
            $radius    = ($request->radius)?$request->radius:3956;
                       return $query->whereRaw("(1.609344 * $radius * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) <= $distance");
            }); 
            
        }
        return $builder;
    }
    public static function unitSize(Builder $builder,$value)
    {
        if(empty($value))
        {
            return $builder;
        }
        if(is_array($value))
        {
            $min = trim_unit_size($value['min']);
            $max = trim_unit_size($value['max']);
            if ((!empty($min)) && (!empty($max))) 
            {
                return $builder->whereBetween('unit_size',[$min,$max]);
            }
            return $builder;
        }
        return $builder;
    }
    public static function price(Builder $builder,$value)
    {
        if (!empty($value)) 
        {
           if(is_array($value))
           {
               
                $min = trim_price($value['min']);
                $max = trim_price($value['max']);
                if((!empty($min))&&(!empty($max)))
                {
                    return $builder->whereBetween('rental_amount', [$min, $max]);
                }
                return $builder;     
           }
                
            return $builder;
         }
         return $builder;
    }
    public static function mode(Builder $builder,$value)
    {
        if(!empty($value))
        {
          return    $builder->whereHas('property',function($query) use($value){
                       $query->where('properties.prop_for', $value);
            });   
        }
        return $builder;
    }
     public static function bathroom(Builder $builder,$value)
    {
        if(!empty($value))
        {
            $value = intval($value);
            return $builder->where('bathroom','<=', $value);
        }
        return $builder; 
    }
    public static function bedroom(Builder $builder, $value)
    {
        if(!empty($value))
        {
            $value = intval($value);
            return $builder->where('bedroom','<=', $value);
        }
        return $builder; 
    } 
    public static function city(Builder $builder, $value)
    {
        if(!empty($value))
        {
          return    $builder->whereHas('property',function($query) use($value){
                       $query->where('properties.city_id', $value);
            });   
        }
        return $builder;
        
    }
    public static function feature(Builder $builder, $value)
    {
        if(!empty($value))
        {
            if(is_array($value))
            {
                foreach($value as $feature)
                {
                    if(!empty($feature))
                    {
                        $builder->whereHas('property',function($query) use($feature){
                              $query->where('feature','like',"%$feature%");
                       });    
                    } 
                }
                return $builder;
            }
            else
            {
                if(!empty($value))
                {
                    $builder->where('feature', 'like', "%$value%");
                }
                
            }
        }
         return $builder;
    }
    public static function order(Builder $builder, $value)
    {
        if($value== 'newest-first')
        {
            return  $builder->orderBy('created_at','DESC');
        }
        else if($value == 'oldest-first')
        {
            return  $builder->orderBy('created_at', 'ASC');
        }
        else if($value == 'top-rated')
        {
            return $builder->whereHas('property',function($query) {
                              $query->orderBy('property_rating', 'DESC');
                    });
        }
        else if($value == 'most-popular')
        {
            return $builder->whereHas('property',function($query){
                              $query->orderBy('view_count', 'DESC');
                    });
        }
        else 
        {
           return  $builder->orderBy('created_at', 'DESC'); 
        }
    }

    public static  function search(Builder $builder,$value)
    {
        if(empty($value))
        {
            return $builder;
        }
        return $builder->whereHas('property',function($query) use($value){
                $query->where("title", 'LIKE', '%' . $value . '%');
                $query->orWhere("address", 'LIKE', '%' . $value . '%');
                $query->orWhereHas('city',function($q) use($value){
                     $q->where("name", 'LIKE', '%' . $value . '%');
                });
            });
       
    }
    public static function propertyType(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return $builder->whereHas('property',function($query) use($value){
                              $query->where('type',$value);
                    });
        }
        return $builder;
    }
    public static function state(Builder $builder, $value)
    {
        if(!empty($value))
        {
            
            return $builder->whereHas('property',function($query) use($value){
                              $query->where('state_id',$value);
                    });
        }
        return $builder;
    }
    
    public static function title(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return $builder->whereHas('property',function($query) use($value){
                              $query->where('title', 'LIKE', '%' . $value . '%');
                    });
        }
        return $builder;
    }
    public static function address(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return $builder->whereHas('property',function($query) use($value){
                              $query->where('address', 'LIKE', '%' . $value . '%');
                    });
        }
        return $builder;
    }
}
