<?php

namespace App\Search\Filters;
use Illuminate\Database\Eloquent\Builder;
class Agent
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
    public static function search(Builder $builder, $value)
    {
        if(!empty($value))
        {
            $builder->where("name", "LIKE", "%$value%");
            $builder->orWhere("address", "LIKE", "%$value%");
            $builder->orWhereHas("city", function($query) use($value) {
                $query->where("name","LIKE","%$value%");
            });
            $builder->orWhereHas("state", function($query) use($value) {
                $query->where("name","LIKE","%$value%");
            });
            $builder->orWhereHas("country", function($query) use($value) {
                $query->where("name","LIKE","%$value%");
            });
        }
        return $builder;
    }
}
