<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
     protected $guarded    = [];

     public function category()
    {

        return $this->BelongsTo('App\CoaCategory','coa_category_id','id');

    }
    public function parent()
    {

        return $this->BelongsTo('App\ChartOfAccount','parent_id','id');

    }
}
