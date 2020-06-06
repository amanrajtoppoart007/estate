<?php

namespace App\DataTable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

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
       $this->essentials  = array('length'=>'10','start'=>'0');
    }
    public  function apply()
    {
        $builder = $this->applyDecoratorsFromRequest($this->filters, ($this->model)->newQuery());
        return $this->getResults($this->filters, $builder);
    }
    private  function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        
        if(!empty($query))
        {
            
            foreach ($request->all() as $key => $value) 
            {
                
                if(!(in_array($key, $this->essentials)))
                {
                    $decorator = $this->createFilterDecorator($this->filterClass);
                    if ($this->isValidDecorator($decorator)) {

                        $query  = $decorator::apply($query, $key, $value);
                    }
                } 
            }
            return $query;
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
    private  function getResults(Request $request,Builder $query)
    {
        /***** very important:: copy instance of builder for getting pure filtered result *****/
        $builder           = $query; 
        $filteredQuery     = $query;
        $totalFilteredData = $filteredQuery->get();
        /**** very important:: now add length and start and other builder instaces for dataTable pagination *********/
        $decorator = __NAMESPACE__ . '\\Filters\\' . 'Essential';
        if($this->isValidDecorator($decorator))
        {
            foreach($this->essentials as $eKey=>$eVal)
            {
                    $value    = ($request->$eKey)? ($request->$eKey):$eVal;
                    $builder  = $decorator::apply($query, $eKey, $value);
            }
            /***check if order parameter is empty***/
            if(!(isset($_REQUEST['order'])))
            {
                $decorator::order($query,'order','created_at');
            }
        }
        
        
        $resource = 'App\\Http\\Resources\\'.$this->filterClass.'Resource';
        if($this->isValidDecorator($resource)) 
        {
            $currentPageData =  $resource::collection($builder->get());
        } 
        else 
        {
            $currentPageData = $builder->get();
        }
        return
            [
                'data' => $currentPageData,
                'draw' => intval($request->draw),
                'recordsTotal' => $this->model::count(),
                'recordsFiltered' => count($totalFilteredData),
            ];
    }
}
