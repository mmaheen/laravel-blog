<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (range(1, 400) as $index) {
            DB::table('blog_tag')->insert([
                'blog_id' => \App\Models\Blog::inRandomOrder()->first()->id, // Randomly select a blog
                'tag_id' => \App\Models\Tag::inRandomOrder()->first()->id // Randomly select a tag
            ]);
        }
    }
}
