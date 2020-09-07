<?php


namespace App\Search;

use App\DataTable\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SearchApi extends Search
{
    public $model,$filter,$processor,$request,$resource;

    /**
     * SearchApi constructor.
     * @param $model
     */
    public function __construct($model)
    {
        parent::__construct();
        $this->model      = $model;
        $this->processor  = $this->createProcessor(str_replace('App\\','',get_class($this->model)));
        $this->resource   = '\\App\\Http\\Resources\\'.(str_replace('App\\','',get_class($this->model))).'SearchResource';

    }

    public function getFilteredData(Builder $builder)
    {
        foreach($this->constraints as $constraint)
        {
            $builder = Filter::apply($builder,$constraint, $this->$constraint);
        }

        if($this->isValidProcessor($this->resource))
        {
            return  $this->resource::collection($builder->get());
        }
        else
        {
            return  \App\Http\Resources\ApiResource::collection($builder->get());
        }
    }
    public function getTotalFilteredRecordCount(Builder $builder)
    {
       $builder = $builder->get();
       return $builder->count();
    }
   public function applyOrderFilter(array $request, Builder $builder)
   {
        if(!isset($request['order']))
        {
            $builder = Filter::apply($builder,'order',['created_at','DESC']);
        }
        return $builder;
   }
    /**
     * @param array $request
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter(array $request,Builder $builder)
    {
        if($this->isValidProcessor($this->processor))
        {
            if(is_array($request))
            {
                $request = Arr::except($request, ['order']);
                foreach($request as $method=>$param)
                {
                    if((!in_array($method,$this->constraints))&&($method!='order'))
                    {
                        $builder = $this->processor::apply($builder,$method,$param);

                    }
                }

            }
            $builder = $this->applyOrderFilter($request,$builder);
            return $builder;
        }
        else
        {
            return null;
        }

    }

    /**
     * @param $param
     * @return string
     */
    public function createProcessor($param)
    {
        $class = Str::studly($param);
        return __NAMESPACE__ . '\\Filters\\'.trim($class);
    }

    /**
     * @param $processor
     * @return bool
     */
    public function isValidProcessor($processor)
    {
         return class_exists($processor);
    }

    /**
     * @return array
     */
     public function getResult()
     {
         $builder = $this->applyFilter(request()->all(),($this->model)->newQuery());
         if($builder)
         {
             if($this->model::count()>5000);
             {
                 ini_set('memory_limit', '1024M');
             }
             /*$count   = $this->applyFilter(request()->all(),($this->model)->newQuery());*/
             $currentPageData          = $this->getFilteredData($builder);
            /* $totalFilteredRecordCount = $this->getTotalFilteredRecordCount($count);
             $totalRecordsCount        = $this->model::count();*/
         }
         else
         {
             $currentPageData = [];
            /* $totalFilteredRecordCount = 0;
             $totalRecordsCount =0;*/
         }

         return   $currentPageData;
     }

}

