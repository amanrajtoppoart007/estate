<?php

namespace App\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;
class PropertySale
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder,$key, $value)
    {
        if(method_exists(__CLASS__,$key)) 
        {
            $class = __CLASS__;
            return $class::$key($builder,$value);
        }
         return $builder;
    }
    
    public static function order(Builder $builder, $value)
    {
         $filter = new Filter();
        if(is_array($value)) 
        {
            $column      = $dir = null;
            $attributes  = ['selling_amount','booking_amount','id','created_at','status'];
            if(in_array($filter->column,$attributes))
            {
               $column      = $filter->column;
               $dir         = $filter->dir;
            }
            if((!empty($column))&&(!empty($dir)))
            {
                return $builder->orderBy($column, $dir);
            }
              return $builder; 
        }
       return $builder;
    }
}