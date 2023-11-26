<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderPizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now();
        \DB::table('order_pizzas')->insert(array (
            0 => array (
              'id'          => 1,
              'order_id'    => 1,
              'pizza_id'    => 1,
              'cost'        => 7.5,
              'quantity'    => 1,
              'created_at'  => $dateNow,
            ),
            1 => array (
              'id'          => 2,
              'order_id'    => 1,
              'pizza_id'    => 2,
              'cost'        => 5.25,
              'quantity'    => 4,
              'created_at'  => $dateNow,
            ),
        ));
    }
}
