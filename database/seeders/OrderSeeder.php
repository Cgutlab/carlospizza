<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateNow = Carbon::now();
        \DB::table('orders')->insert(array (
            0 => array (
              'id'      => 1,
              'name'    => '1001',
              'date'    => $dateNow->subMinutes(5),
              'price'   => 28.50,
              'created_at' => $dateNow,
            )
        ));
    }
}
