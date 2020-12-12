<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Observers\ProductCategoryObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Product::observe(ProductObserver::class);
        ProductCategory::observe(ProductCategoryObserver::class);
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