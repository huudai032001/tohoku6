<?php

namespace App\Providers;

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
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
            
            Route::prefix('admin')    
                ->middleware(['web', 'login', 'role:admin'])                
                ->namespace($this->namespace)
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            
        });
        

        Route::macro('crud', function ($prefix, $controllerClass)
        {
            Route::prefix($prefix)->name($prefix . '.')->group(function () use ($controllerClass)
            { 
                Route::get('/list', [$controllerClass, 'index'])->name('index');                

                Route::get('/bulk-action', [$controllerClass, 'getBulkAction'])->name('bulk-action');
                Route::post('/bulk-action-submit', [$controllerClass, 'postBulkAction'])->name('bulk-action-submit');

                Route::get('/{action}', [$controllerClass, 'getGeneralAction'])->name('general-action');
                Route::post('/{action}', [$controllerClass, 'postGeneralAction']);                

                Route::get('/{id}/{action}', [$controllerClass, 'getItemAction'])->name('item-action');
                Route::post('/{id}/{action}', [$controllerClass, 'postItemAction']);   
                
            });
            
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
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
