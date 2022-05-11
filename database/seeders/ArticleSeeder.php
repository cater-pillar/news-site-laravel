<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Town;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->count(3)
                          ->hasAttached(Town::findMany([mt_rand(1,29),mt_rand(1,29)]))
                          ->create();
    }
}
