<?php

namespace App\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;
class Country
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
    public static  function search(Builder $builder,$value)
    {
        $filter = new Filter();
        if(is_array($value))
        {
            if(!empty($value['value']))
            {
               return $builder->where("name", 'LIKE', '%' . $filter->keyword . '%');
            }
          return $builder;
        }
        else 
        {
            return $builder->where("name", 'LIKE', '%' . $value. '%');
        }
       
    }
    public static function order(Builder $builder, $value)
    {
         $filter = new Filter();
        if(is_array($value)) 
        {
            $column      = $dir = null;
            $attributes  = ['id','name','created_at','is_disabled'];
            if(in_array($filter->column,$attributes))
            {
               $column      = $filter->column;
               $dir         = $filter->dir;
            }
            if((!empty($column))&&(!empty($dir)))
            {
                return $builder->orderBy($column, $dir);
            }
        }
        return $builder;
    }
}
