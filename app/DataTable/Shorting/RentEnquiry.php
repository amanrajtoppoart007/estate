<?php
namespace App\DataTable\Shorting;
use Illuminate\Database\Eloquent\Builder;

class RentEnquiry
{

     public static function apply(Builder $builder,$method, $direction)
    {
        if(method_exists(__CLASS__,$method))
        {
            $class = __CLASS__;
            return $class::$method($builder,$direction);
        }
         return $builder;
    }

    public static function name(Builder $builder,$dir)
    {
       return $builder->orderBy('name',$dir);
    }
    public static function id(Builder $builder,$dir)
    {
        return $builder->orderBy('id',$dir);
    }
    public static function email(Builder $builder,$dir)
    {
         return $builder->orderBy('email',$dir);
    }
    public static function broker(Builder $builder,$dir)
    {
        return $builder;
    }
    public static function status(Builder $builder,$dir)
    {
        return $builder->orderBy('status',$dir);
    }
    public static function created_at(Builder $builder,$dir)
    {
        return $builder->orderBy('created_at',$dir);
    }
}
