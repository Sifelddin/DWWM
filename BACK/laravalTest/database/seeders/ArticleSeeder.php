<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'titre'      => Str::random(10),
            'desc'   => Str::random(30),
            'created_at'     => now(),
            'created_at'       => now(),
            
        ]);
    }
}
