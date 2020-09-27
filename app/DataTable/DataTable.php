<?php


namespace App\DataTable;

class DataTable
{
    public $length,$start,$draw;
    public $constraints = array('start','length');
    public function __construct()
    {
        $this->length = isset(request()->length)?request()->length:10;
        $this->draw   = isset(request()->draw)?request()->draw:0;
        $this->start  = isset(request()->start)?request()->start:0;
    }
}
