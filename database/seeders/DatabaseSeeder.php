<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            //for user
            RoleSeeder::class,
            UserSeeder::class,

            //for pages gallery
            CategorySeeder::class,
            GallerieSeeder::class,

            //for blog
            CategoryArticleSeeder::class,
            TagSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
