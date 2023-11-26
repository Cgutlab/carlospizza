<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $dateNow = Carbon::now()->format('Y-m-d h:i:s');
      \DB::table('ingredients')->insert(array (
        0 => array (
          'id'      => 1,
          'name'    => 'Tomato',
          'image'   => 'tomato.jpg',
          'price'   => 0.5,
          'created_at' => $dateNow,
        ),
        1 => array (
          'id'      => 2,
          'name'    => 'Sliced mushrooms',
          'image'   => 'sliced_mushrooms.webp',
          'price'   => 0.5,
          'created_at' => $dateNow,
        ),
        2 => array (
          'id'      => 3,
          'name'    => 'Feta cheese',
          'image'   => 'feta_cheese.jpg',
          'price'   => 1.0,
          'created_at' => $dateNow,
        ),
        3 => array (
          'id'      => 4,
          'name'    => 'Sausages',
          'image'   => 'sausages.jpg',
          'price'   => 1.0,
          'created_at' => $dateNow,
        ),
        4 => array (
          'id'      => 5,
          'name'    => 'Sliced onion',
          'image'   => 'sliced_onion.jpg',
          'price'   => 0.5,
          'created_at' => $dateNow,
        ),
        5 => array (
          'id'      => 6,
          'name'    => 'Mozzarella cheese',
          'image'   => 'mozzarella_cheese.webp',
          'price'   => 0.5,
          'created_at' => $dateNow,
        ),
        6 => array (
          'id'      => 7,
          'name'    => 'Oregano',
          'image'   => 'oregano.webp',
          'price'   => 1.0,
          'created_at' => $dateNow,
        ),
        7 => array (
          'id'      => 8,
          'name'    => 'Bacon',
          'image'   => 'bacon.jpg',
          'price'   => 1.0,
          'created_at' => $dateNow,
        ),
      ));
    }
}
