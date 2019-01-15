<?php

namespace App\Providers;

use App\Http\Composers\ProductTypes;
use App\Http\View\Composers\CartItems;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoriesList;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('shop.layouts.categories', CategoriesList::class);
        View::composer('*', CartItems::class);
        View::composer('*', ProductTypes::class);
    }
}