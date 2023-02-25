<?php

namespace Database\Seeders;

use Database\Factories\PostsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostsFactory::factory()->count(50)->create();
    }
}
