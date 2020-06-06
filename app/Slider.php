<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table    = 'sliders';
    protected $fillable = ['admin_id', 'page','position', 'created_at', 'is_disabled'];
    public function sliderContents()
    {
       return $this->hasMany('App\SliderContent','slider_id','id');
    }
}
