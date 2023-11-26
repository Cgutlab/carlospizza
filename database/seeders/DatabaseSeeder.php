<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\PizzaSeeder;
use Database\Seeders\IngredientSeeder;
use Database\Seeders\PizzaIngredientsSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderPizzaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            PizzaSeeder::class,
            IngredientSeeder::class,
            PizzaIngredientsSeeder::class,
            OrderSeeder::class,
            OrderPizzaSeeder::class,
        ]);
    }
}
