<?php

namespace App\Search;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use DB;
class Api
{
    var $model;
    var $filters;
    var $essentials;
    var $filterClass;
    public function __construct($model,Request $filters)
    {
       $this->filters = $filters;
       $this->model   = $model;
       $this->filterClass = str_replace('App\\','',get_class($this->model));
       $this->essentials  = array('length','start');
    }
    public  function apply($pagination=null)
    {
        $query = $this->applyDecoratorsFromRequest($this->filters, ($this->model)->newQuery());
        return $this->getResults($pagination,$query);
    }
    private  function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        $default    = __NAMESPACE__ . '\\Filters\\' . 'Essential';
        $decorator  = $this->createFilterDecorator($this->filterClass);
        foreach ($request->all() as $key => $value) 
        {
            if(!empty($value))
            {
                if(in_array($key,$this->essentials))
                {
                   $query = $this->apply_callback($query,$default,$key,$value);
                }
                else 
                {
                    $query = $this->apply_callback($query,$decorator,$key,$value);
                }
            }
            
        }
        if(!isset($_REQUEST['order']))
        {      
            $query = $this->apply_callback($query,$default,'order',null);
        }
        return $query;
    }
    private  function createFilterDecorator($name)
    {
        $class = Str::studly($name);
        return __NAMESPACE__ . '\\Filters\\' . $class;
    }
    private  function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }
    public  function apply_callback(Builder $builder,$class,$key,$value)
    {
        if($this->isValidDecorator($class)) 
        {
            $key = Str::camel($key);
            if(method_exists($class,$key)) 
            {
               return  $class::$key($builder,$value);
            }
            return $builder;
        }
        return $builder;
    }
    private  function getResults($pagination,Builder $query)
    {
        if(!empty($pagination))
        {
          $result =  $query->whereHas('property', function ($q) {
                $q->where(['properties.is_disabled' => "0"]);
            })->paginate($pagination);
        }
        else
        {
            $result =   $query->whereHas('property', function ($q) {
                $q->where(['properties.is_disabled' => "0"]);
            })->get();
        }
        
        return $result;
    }
}
