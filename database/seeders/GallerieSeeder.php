<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([
            [
                'name' => 'swimming',
                'src' => 'gallery3.jpg',
                'categories_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Ballo',
                'src' => 'gallery2.jpg',
                'categories_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'McLaren',
                'src' => 'gallery1.jpg',
                'categories_id' => 3,
                'created_at' => now(),
            ],
        ]);
    }
}
