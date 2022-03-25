<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                "fonction_id"=>1,
                "img"=>"employe1.jpg",
                "fullname"=>"Jeanette Owens",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",

            ],
            [
                "fonction_id"=>2,
                "img"=>"employe2.jpg",
                "fullname"=>"Henry Garret",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
            [
                "fonction_id"=>3,
                "img"=>"employe3.jpg",
                "fullname"=>"Tommy Alexander",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
            [
                "fonction_id"=>4,
                "img"=>"employe4.jpg",
                "fullname"=>"Penny Soto",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
            [
                "fonction_id"=>5,
                "img"=>"employe5.png",
                "fullname"=>"Alex Cox",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
            [
                "fonction_id"=>4,
                "img"=>"employe6.png",
                "fullname"=>"Alfredo Romero",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
            [
                "fonction_id"=>6,
                "img"=>"employe7.jpg",
                "fullname"=>"Glenda Gilbert",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
            [
                "fonction_id"=>7,
                "img"=>"employe8.png",
                "fullname"=>"Sheila Carter",
                "description"=>"Lorem Ipsum which looks many web sites pass websites is therefore always.",
            ],
        ]);

    }
}
