<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'tenant' => \App\Tenant::class,
            'owner' => \App\Owner::class,
            'buyer' => \App\Buyer::class,
            'manager' => \App\Admin::class,
            'rent' => \App\PropertyUnitAllotment::class,
            'sale' => \App\PropertySale::class,
            'maintenance' => \App\MaintenanceWork::class,
        ]);
    }
}
