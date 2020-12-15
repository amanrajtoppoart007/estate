<?php


namespace App\DataTable\Filters;


use Illuminate\Database\Eloquent\Builder;

class TenancyContract
{
        public static function apply(Builder $builder,$key, $value): Builder
        {
        if(method_exists(__CLASS__,$key))
        {
            $class = __CLASS__;
            return $class::$key($builder,$value);
        }
         return $builder;
    }
    public static  function search(Builder $builder,$value): Builder
    {
        $filter = new Filter();
        if(is_array($value))
        {
            if(!empty($value['value']))
            {
               return $builder->where("unit_id", 'LIKE', '%' . $filter->keyword . '%');
            }
          return $builder;
        }
        else
        {
            return $builder->where("name", 'LIKE', '%' . $value. '%');
        }

    }
}
