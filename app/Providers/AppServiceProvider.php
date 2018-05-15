<?php

namespace App\Providers;

use App\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // for older mysql
        Schema::defaultStringLength(191);

        // Bookable view composer
        view()->composer('layouts.selectBookable', function ($view) {
            $view->with('bookable', Admin::bookable()->get());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //
    }
}
