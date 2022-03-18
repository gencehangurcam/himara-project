<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                "name"=>"roman",
                "email"=>"roman@gmail.com",
                "comments"=>"consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat.",
                "profilImage"=>"blog-post1.jpg",
                "article_id"=>1,
                "created_at"=>now(),
            ],
            [
                "name"=>"Helip",
                "email"=>"helip@gmail.com",
                "comments"=>"consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat.",
                "profilImage"=>"blog-post1.jpg",
                "article_id"=>1,
                "created_at"=>now(),
            ],
            [
                "name"=>"Charmant",
                "email"=>"charmant@gmail.com",
                "comments"=>"consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat.",
                "profilImage"=>"blog-post1.jpg",
                "article_id"=>1,
                "created_at"=>now(),
            ],
            [
                "name"=>"Melanie",
                "email"=>"melanie@gmail.com",
                "comments"=>"consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat.",
                "profilImage"=>"blog-post2.jpg",
                "article_id"=>2,
                "created_at"=>now(),
            ],
            [
                "name"=>"cocktail",
                "email"=>"aq@hotmail.com",
                "comments"=>"consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat.",
                "profilImage"=>"blog-post3.jpg",
                "article_id"=>3,
                "created_at"=>now(),
            ],
            [
                "name"=>"greg",
                "email"=>"greg@hotmail.com",
                "comments"=>"consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat.",
                "profilImage"=>"blog-post4.jpg",
                "article_id"=>4,
                "created_at"=>now(),
            ],
        ]);

    }
}
