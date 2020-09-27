<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Essential
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param $key
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

    public static  function length(Builder $builder,$value)
    {
        if(!empty($value))
        {
            return $builder->take($value);
        }
        return $builder;
    }
    public static  function  start(Builder $builder,$value)
    {
        if(!empty($value))
        {
            return $builder->skip($value);
        }
        return $builder;
    }
    public static function order(Builder $builder)
    {
        return $builder->orderBy('created_at','DESC');
    }

}
