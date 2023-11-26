<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \DB::table('admins')->insert([
            'name' => 'Carlos',
            'username' => 'carlos@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
        ]);
    }
}
