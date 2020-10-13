<?php


namespace App\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class Filter implements FilterInterface
{
    /**
     * @param Builder $builder
     * @param $method
     * @param $param
     * @return Builder
     */
     public static function apply(Builder $builder,$method, $param)
    {
        if(method_exists(__CLASS__,$method))
        {
            $class = __CLASS__;
            return $class::$method($builder,$param);
        }
         return $builder;
    }

   public static function start(Builder $builder,$value)
   {
        if(!empty($value))
        {
             $builder->skip($value);
        }
        return $builder;

   }

    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
   public static function length($builder,$value)
   {
      if(!empty($value))
      {
          $builder->take($value, 10);
      }
       return $builder;
   }
}
