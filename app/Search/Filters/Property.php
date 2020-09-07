<?php

namespace App\Search\Filters;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;

class Property
{

    public static function apply(Builder $builder,$key, $value)
    {
        if(method_exists(__CLASS__,$key))
        {
            $class = __CLASS__;
            return $class::$key($builder,$value);

        }
         return $builder;
    }

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
          return    $builder->where('prop_for',$value);
        }
        return $builder;
    }
     public static function bathroom(Builder $builder,$value)
    {
        if(!empty($value))
        {
            $value = intval($value);
            return $builder->whereHas('propertyUnitTypes',function($query) use ($value){
               $query->where( 'bathroom','<=', $value);
            });
        }
        return $builder;
    }
    public static function bedroom(Builder $builder, $value)
    {
        if(!empty($value))
        {
            $value = intval($value);
            return $builder->whereHas('propertyUnitTypes',function($query) use ($value){
               $query->where( 'bedroom','<=', $value);
            });
        }
        return $builder;
    }
    public static function city(Builder $builder, $value)
    {
        if(!empty($value))
        {
            $builder->where('city_id', $value);
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
                        $builder->where('feature','like',"%$feature%");
                    }
                }
                return $builder;
            }
            else
            {
                $builder->where('feature', 'like', "%$value%");
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
            return $builder->orderBy('property_rating', 'DESC');
        }
        else if($value == 'most-popular')
        {
            return $builder->orderBy('view_count', 'DESC');
        }
        else
        {
           return  $builder->orderBy('created_at', 'DESC');
        }
    }

    public static  function search(Builder $builder,$value)
    {
        if(!empty($value))
        {
               $builder->where("title", 'LIKE', '%' . $value . '%');
                $builder->orWhere("address", 'LIKE', '%' . $value . '%');
                $builder->orWhereHas('city',function($q) use($value){
                     $q->where("name", 'LIKE', '%' . $value . '%');
                });
        }
        return $builder;
    }
    public static function propertyType(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return $builder->where('type',$value);
        }
        return $builder;
    }
    public static function state(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return $builder->where('state_id',$value);
        }
        return $builder;
    }

    public static function title(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return  $builder->where('title', 'LIKE', '%' . $value . '%');
        }
        return $builder;
    }
    public static function address(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return  $builder->where('address', 'LIKE', '%' . $value . '%');
        }
        return $builder;
    }

}
