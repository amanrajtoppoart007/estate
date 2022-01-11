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
            'authorised_person' => \App\AuthorisedPerson::class,
            'agent' => \App\Agent::class,
            'user' => \App\User::class,
            'tenant' => \App\Tenant::class,
            'owner_auth_person' => \App\OwnerAuthPerson::class,
            'owner' => \App\Owner::class,
            'buyer' => \App\Buyer::class,
            'manager' => \App\Admin::class,
            'rent' => \App\PropertyUnitAllotment::class,
            'sale' => \App\PropertySale::class,
            'maintenance' => \App\MaintenanceWork::class,
            'property' => \App\Property::class,
            'tenancy_contracts' => \App\TenancyContract::class,
        ]);
    }
}
