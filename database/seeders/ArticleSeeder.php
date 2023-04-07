<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::insert([
            'title' => Str::random(10),
            'body' => Str::random(10),
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
            'published_at' => Date::now()
        ]);
    }
}
