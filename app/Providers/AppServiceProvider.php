<?php

namespace App\Providers;

use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\EloquentBrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategoryRepository;
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

        $this->app->bind(
            CategoryRepository::class,
            EloquentCategoryRepository::class
        );

        $this->app->bind(
            BrandRepository::class,
            EloquentBrandRepository::class
        );
    }
}
