<?php


namespace App\DataTable\Shorting;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Shorting implements ShortingInterface
{
    /**
     * @param Builder $builder
     * @param $model
     * @return Builder
     */
    public static function apply(Builder $builder, $model)
    {


        $model = Str::snake($model);
        $method = request()->columns[request()->order[0]['column']]['data'];

        if ($method)
        {
            $dir = request()->order[0]['dir'];

            if (method_exists(__CLASS__, $model)) {
                $class = __CLASS__;
                $builder = $class::$model($builder, $method, $dir);
            }
        }

        return $builder;
    }

    public static function tenant($builder, $method, $value)
    {
        return \App\DataTable\Shorting\Tenant::apply($builder, $method, $value);
    }
     public static function rent_enquiry($builder, $method, $value)
    {
        return \App\DataTable\Shorting\RentEnquiry::apply($builder, $method, $value);
    }
}
