<?php
namespace App\DataTable\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Document
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
    public static  function search(Builder $builder,$value)
    {

        return $builder;

    }
    public static function order(Builder $builder, $value)
    {
         $filter = new Filter();
        if(is_array($value))
        {
            $column      = $dir = null;
            $attributes  = ['id','created_at','updated_at','status'];
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

    public static function expiry_date(Builder $builder, $value)
    {
          if(!empty($value))
          {
                $builder->where(['date_key'=>'EXPIRY_DATE']);
                $from   = Carbon::now()->subDays(90)->format("Y-m-d");
                $to = Carbon::now()->format("Y-m-d");
                $builder->whereDate('date_value','>=',$from);
                $builder->whereDate('date_value','<=',$to);
          }
          return $builder;
    }
}
