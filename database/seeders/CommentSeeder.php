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

        foreach (range(1, 500) as $index) {
            \App\Models\Comment::create([
                'blog_id' => \App\Models\Blog::inRandomOrder()->first()->id,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'parent_id' => null, // For simplicity, no nested comments in this seeder
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 4),
                'created_at' => $faker->dateTimeThisYear(),
            ]);
        }

        //create 100 parent comment
        foreach (range(1, 100) as $index) {
            $parentComment = \App\Models\Comment::create([
                'blog_id' => \App\Models\Blog::inRandomOrder()->first()->id,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'parent_id' => null,
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 4),
                'created_at' => $faker->dateTimeThisYear(),
            ]);

            // Create 1-5 replies for each parent comment
            foreach (range(1, rand(1, 5)) as $replyIndex) {
                \App\Models\Comment::create([
                    'blog_id' => $parentComment->blog_id,
                    'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                    'parent_id' => $parentComment->id,
                    'description' => $faker->realText($maxNbChars = 150, $indexSize = 3),
                    'created_at' => $faker->dateTimeThisYear(),
                ]);
            }
        }

    }
}
