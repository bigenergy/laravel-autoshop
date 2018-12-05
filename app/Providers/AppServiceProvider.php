<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\EloquentBrandRepository;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\EloquentCartRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Repositories\Product\EloquentProductRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($categoryShowList) {
            $categoryShowList->with('categoryShowList',  Category::all());
        });
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

        $this->app->bind(
            CartRepository::class,
            EloquentCartRepository::class
        );
    }
}
