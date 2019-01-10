<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\EloquentBrandRepository;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\EloquentCartRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Repositories\Order\EloquentOrderRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Pages\EloquentPagesRepository;
use App\Repositories\Pages\PagesRepository;
use App\Repositories\Product\EloquentProductRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductType\EloquentProductTypeRepository;
use App\Repositories\ProductType\ProductTypeRepository;
use App\Repositories\Props\EloquentPropsRepository;
use App\Repositories\Props\PropsRepository;
use App\Repositories\Status\EloquentStatusRepository;
use App\Repositories\Status\StatusRepository;
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

        $this->app->bind(
            StatusRepository::class,
            EloquentStatusRepository::class
        );

        $this->app->bind(
            OrderRepository::class,
            EloquentOrderRepository::class
        );

        $this->app->bind(
            ProductTypeRepository::class,
            EloquentProductTypeRepository::class
        );

        $this->app->bind(
            PropsRepository::class,
            EloquentPropsRepository::class
        );

        $this->app->bind(
            PagesRepository::class,
            EloquentPagesRepository::class
        );
    }
}
