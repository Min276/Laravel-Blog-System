<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Article;
// use App\Models\Category;
// use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(20)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Comment::factory(60)->create();

        \App\Models\User::factory()->create([
            "name" => "Min Khant",
            "email" => "minkhant@gmail.com",
        ]);

        \App\Models\User::factory()->create([
            "name" => "Eric Kyaw",
            "email" => "erickyaw@gmail.com",
        ]);

    }
}
