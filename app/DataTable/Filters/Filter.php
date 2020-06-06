<?php

namespace App\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
class Filter
{
    var $keyword;
    var $column;
    var $dir;
    public function __construct()
    {
       $request       = request()->all();
       $this->column  = $request['columns'][$request['order'][0]['column']]['data'];
       $this->dir     = $request['order'][0]['dir'];
       $this->keyword = $request['search']['value'];
    }
}
