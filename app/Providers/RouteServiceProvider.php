<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        //$this->mapApiRoutes();
        $this->mapAdminRoutes();
        //$this->mapWebRoutes();
        $this->mapFrontRoutes();
        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }
    /**
     * Define the "front" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFrontRoutes()
    {
        Route::middleware('front')
            ->namespace($this->namespace)
            ->group(base_path('routes/front.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
//    protected function mapWebRoutes()
//    {
//        Route::middleware('web')
//             ->namespace($this->namespace)
//             ->group(base_path('routes/web.php'));
//    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
//    protected function mapApiRoutes()
//    {
//        Route::prefix('api')
//             ->middleware('api')
//             ->namespace($this->namespace)
//             ->group(base_path('routes/api.php'));
//    }
}
