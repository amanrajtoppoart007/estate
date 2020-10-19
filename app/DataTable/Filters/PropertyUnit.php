<?php

namespace App\DataTable\Filters;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class PropertyUnit
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $key, $value)
    {
        if(method_exists(__CLASS__, $key))
        {
            $class = __CLASS__;
            return $class::$key($builder, $value);
        }
        return $builder;
    }
    public static  function search(Builder $builder, $value)
    {
        $filter = new Filter();
        if(is_array($value))
        {
            if(!empty($value['value']))
            {
                return $builder->where("title", 'LIKE', '%' . $filter->keyword . '%');
            }
            return $builder;
        }
        else
        {
            return $builder->where("title", 'LIKE', '%' . $value . '%');
        }
    }
    public static  function property(Builder $builder, $value)
    {
        if(!empty($value))
        {
            return $builder->where("property_id",$value);
        }
        return $builder;
    }
    public static  function custom_search(Builder $builder, $value)
    {
       if(empty($value))
       {
           return $builder;
       }
        $builder->where('title', 'like',"%$value%");
        $builder->orWhere('unitcode', 'like',"%$value%");
        $builder->orWhere('floor_no', 'like',"%$value%");
        $builder->orWhere('flat_number', 'like',"%$value%");
        return $builder;
    }

    public static function order(Builder $builder, $value)
    {
        $filter = new Filter();
        if(is_array($value))
        {
            $column      = $dir = null;
            $attributes  = ['id', 'title', 'created_at'];
            if (in_array($filter->column, $attributes)) {
                $column      = $filter->column;
                $dir         = $filter->dir;
            }
            if((!empty($column)) && (!empty($dir)))
            {
                return $builder->orderBy($column, $dir);
            }
            return $builder;
        }
        return $builder;
    }
    public static function month(Builder $builder, $value)
    {
        if(is_array($value))
        {
            foreach($value as $int)
            {
                $int = intval($int);
                if(is_int($int))
                {
                    $params[] = $int;
                }
            }
            /* $params = join("','", $params);  */
            if(empty($params))
            {
                return $builder;
            }
            return $builder->whereHas('property_unit_allotment',function($q) use($params){
                $q->whereIn(DB::raw('MONTH(lease_end)'), $params);

            });

        }
        return $builder;
    }
    public static function agent(Builder $builder, $value)
    {
        if(is_array($value))
        {
            foreach($value as $int)
            {
                $int = intval($int);
                if(is_int($int))
                {
                    $params[] = $int;
                }
            }
            if(empty($params))
            {
                return $builder;
            }
            return $builder->whereIn('agent_id', $params);
        }
        return $builder;
    }
    public static function floor(Builder $builder, $value)
    {
        if(is_array($value))
        {
            foreach($value as $int)
            {
                $int = intval($int);
                if(is_int($int))
                {
                    $params[] = $int;
                }
            }
            if(empty($params))
            {
                return $builder;
            }
            return $builder->whereIn('floor_no', $params);
        }
        return $builder;
    }
}
