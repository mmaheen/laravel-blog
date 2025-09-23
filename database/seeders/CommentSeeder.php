<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        foreach (range(1, 600) as $index) {
            \App\Models\Comment::create([
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'blog_id' => \App\Models\Blog::inRandomOrder()->first()->id,
                'content' => $faker->paragraph(),
            ]);
        }
    }
}
