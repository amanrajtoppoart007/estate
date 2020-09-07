<?php


namespace App\Search;

class Search
{
    public $page,$limit;
    public $constraints = array('page','limit');
    public function __construct()
    {
        $this->page   = isset(request()->page)?request()->page:0;
        $this->limit  = isset(request()->limit)?request()->limit:0;
    }
}
