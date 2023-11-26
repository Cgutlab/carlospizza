<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Bind data to the view in the 'adm.dashboard' context
        view()->composer(['adm.dashboard'], function ($view) {
            // Retrieve orders, pizzas, and ingredients data from their respective models, ordered by name
            $orders = \App\Models\Order::orderBy('name')->get();
            $pizzas = \App\Models\Pizza::orderBy('name')->get();
            $ingredients = \App\Models\Ingredient::orderBy('name')->get();

            // Pass the retrieved data to the view
            $view->with(compact('orders', 'pizzas', 'ingredients'));
        });

    }
}
