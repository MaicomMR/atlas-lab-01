<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind('App\Repositories\Contracts\CompraRepositoryInterface', 'App\Repositories\CompraRepository');    
        $this->app->bind('App\Repositories\Contracts\ListaRepositoryInterface', 'App\Repositories\ListaRepository');    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
