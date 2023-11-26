<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Helpers\Helper;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now()->format('Y-m-d h:i:s');
        \DB::table('pizzas')->insert(array (
            0 => array (
              'id'      => 1,
              'name'    => 'The Fun Pizza',
              'image'   => 'the_fun_pizza.jpg',
              'percent' => Helper::percentValue,
              'created_at' => $dateNow,
            ),
            1 => array (
              'id'      => 2,
              'name'    => 'The Super Mushroom Pizza',
              'image'   => 'the_super_mushroom_pizza.jpg',
              'percent' => Helper::percentValue,
              'created_at' => $dateNow,
            )
        ));
    }
}
