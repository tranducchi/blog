<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Categories;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
           Schema::defaultStringLength(191);
           view()->composer('layouts.sidebar', function($view){
                $cat = Categories::all();
                $view->with('cat', $cat);
           });
           view()->composer('layouts.footer', function($view){
            $cat = Categories::all();
            $view->with('cat', $cat);
       });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
