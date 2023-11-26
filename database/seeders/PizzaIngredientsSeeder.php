<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PizzaIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now()->format('Y-m-d h:i:s');
        \DB::table('pizza_ingredients')->insert(array (
            0 => array (
                'id'            => 1,
                'pizza_id'      => 1,
                'ingredient_id' => 1,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            1 => array (
                'id'            => 2,
                'pizza_id'      => 1,
                'ingredient_id' => 2,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            2 => array (
                'id'            => 3,
                'pizza_id'      => 1,
                'ingredient_id' => 3,
                'cost'          => 1.0,
                'created_at'    => $dateNow,
            ),
            3 => array (
                'id'            => 4,
                'pizza_id'      => 1,
                'ingredient_id' => 4,
                'cost'          => 1.0,
                'created_at'    => $dateNow,
            ),
            4 => array (
                'id'            => 5,
                'pizza_id'      => 1,
                'ingredient_id' => 5,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            5 => array (
                'id'            => 6,
                'pizza_id'      => 1,
                'ingredient_id' => 6,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            6 => array (
                'id'            => 7,
                'pizza_id'      => 1,
                'ingredient_id' => 7,
                'cost'          => 1.0,
                'created_at'    => $dateNow,
            ),



            7 => array (
                'id'            => 8,
                'pizza_id'      => 2,
                'ingredient_id' => 1,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            8 => array (
                'id'            => 9,
                'pizza_id'      => 2,
                'ingredient_id' => 2,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            9 => array (
                'id'            => 10,
                'pizza_id'      => 2,
                'ingredient_id' => 6,
                'cost'          => 0.5,
                'created_at'    => $dateNow,
            ),
            10 => array (
                'id'            => 11,
                'pizza_id'      => 2,
                'ingredient_id' => 7,
                'cost'          => 1.0,
                'created_at'    => $dateNow,
            ),
            11 => array (
                'id'            => 12,
                'pizza_id'      => 2,
                'ingredient_id' => 8,
                'cost'          => 1.0,
                'created_at'    => $dateNow,
            )
        ));
    }
}
