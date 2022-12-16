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
        $this->app->bind('App\Repositories\Contracts\ItemRepositoryInterface', 'App\Repositories\ItemRepository');  
        $this->app->bind('App\Repositories\Contracts\ListaRepositoryInterface', 'App\Repositories\ListaRepository');

        $this->app->bind('App\Services\Contracts\ListServiceInterface', 'App\Services\ListService');    
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
