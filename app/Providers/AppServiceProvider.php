<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Helper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set the default string length for database schema
        Schema::defaultStringLength(191);

        // Use Bootstrap style for paginator
        Paginator::useBootstrap();
        
        // Share global view variables like money symbol, percent value, and percent symbol
        view()->share([
            "moneySymbol" => Helper::moneySymbol,
            "percentValue" => Helper::percentValue,
            "percentSymbol" => Helper::percentSymbol,
        ]);
    }
}
