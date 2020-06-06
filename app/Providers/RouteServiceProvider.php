<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
     const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapOwnerRoutes();
        $this->mapTenantRoutes();
        $this->mapAccountingRoutes();
    }


    protected function mapWebRoutes()
    {

        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }


    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'master',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }
    protected function mapTenantRoutes()
    {
        Route::group([
            'middleware' => ['web', 'tenant', 'auth:tenant'],
            'prefix' => 'tenant',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/tenant.php');
        });
    }
    protected function mapOwnerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'owner', 'auth:owner'],
            'prefix' => 'owner',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/owner.php');
        });
    }
    protected function mapAccountingRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'master',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/accounting.php');
        });
    }
}
