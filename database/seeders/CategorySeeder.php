<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                "nom"=>"restaurant",
                "filter"=>"filter-restaurant",
                "created_at"=>now(),
            ],
            [
                "nom"=>"swimmingpool",
                "filter"=>"filter-swimmingpool",
                "created_at"=>now(),
            ],
            [
                "nom"=>"spa",
                "filter"=>"filter-spa",
                "created_at"=>now(),
            ],
            [
                "nom"=>"roomview",
                "filter"=>"filter-roomview",
                "created_at"=>now(),
            ],
        ]);
    }
}
