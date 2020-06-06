<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderContent extends Model
{
    protected $table    = 'slider_contents';
    protected $fillable = ['slider_id','image','title','short_description','description','created_at', 'is_disabled'];
    public function slider()
    {
        return $this->belongsTo('App\Slider');
    }
}
