<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (range(1, 200) as $index) {
            DB::table('blog_tag')->insert([
                'blog_id' => \App\Models\Blog::inRandomOrder()->first()->id,
                'tag_id' => \App\Models\Tag::inRandomOrder()->first()->id
            ]);
        }
    }
}
