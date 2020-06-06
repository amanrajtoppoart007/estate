<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {

     }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php',GLOB_NOSORT) as $file) 
        {
            require_once($file);          
        }
    }
}
