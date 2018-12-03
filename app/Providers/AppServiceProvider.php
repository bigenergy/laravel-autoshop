<?php

namespace App\Providers;

use App\Repositories\Product\EloquentProductRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class
        );
    }
}
