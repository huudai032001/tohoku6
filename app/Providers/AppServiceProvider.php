<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;

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
        Paginator::useBootstrap();        

        Relation::enforceMorphMap([
            'post' => 'App\Models\Post',
        ]);

        // Paginator::defaultView('view-name');

        // Paginator::defaultSimpleView('view-name');

        Blade::directive('selected', function ($expression) {
            return "<?php if($expression) echo 'selected'; ?>";          
        });

        Blade::directive('checked', function ($expression) {
            return "<?php if($expression) echo 'checked'; ?>";          
        });

        Blade::directive('active', function ($expression) {
            return "<?php if($expression) echo 'active'; ?>";         
        });

        Blade::directive('trans', function ($expression) {
            return "<?php echo __($expression); ?>";         
        });

        Blade::directive('formControl', function ($expression) {
            $segm = explode(',', $expression);
            $class = '\App\Form\\' . $segm[0];
            $option = $segm[1];
            return "<?php (new $class($option))->editMode(); ?>";         
        });

    }
}
