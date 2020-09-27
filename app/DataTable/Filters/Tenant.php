<?php

namespace App\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;
class Tenant
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
        if (method_exists(__CLASS__,$key))
        {
             $class = __CLASS__;
             return $class::$key($builder,$value);
        }
         return $builder;
    }

    public static  function search(Builder $builder,$value)
    {

        if(is_array($value))
        {
            if(!empty($value['value']))
            {
               return $builder->where("name", 'LIKE', '%' . $value['value'] . '%');
            }
          return $builder;
        }
        else
        {
            return $builder->where("name", 'LIKE', '%' . $value. '%');
        }

    }
}
