<?php

namespace App\Providers;

use App\MultiStep\Routing\MultiStepRouter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * If specified, this namespace is automatically applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = null;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        Route::macro('multistep', function ($uri, $controller) {
            return new MultiStepRouter(
                $uri, $controller
            );
        });

        $this->routes(function () {

            // Web - Mostly Auth / Guest Routing
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Serviceperson
            Route::middleware(['web', 'auth:sanctum', 'password.change'])
                ->group(base_path('routes/serviceperson.php'));

            // Serviceperson Administration
            Route::middleware(['web', 'auth', 'password.change', 'verified'])
                ->prefix('approval_system')
                ->group(base_path('routes/administration.php'));

            // Manpower / HR
            Route::middleware(['web', 'auth', 'password.change', 'verified'])
                ->prefix('manpower')
                ->group(base_path('routes/manpower.php'));

            // System Administration
            Route::middleware(['web', 'auth', 'password.change','verified'])
                ->group(base_path('routes/system_admin.php'));

            // Lookup
            Route::middleware('web')
                ->group(base_path('routes/lookup.php'));

            //Api
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
