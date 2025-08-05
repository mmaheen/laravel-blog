<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        $source_path = public_path('assets/frontend/img/blog');
        $destination_path = public_path('uploads/blogs');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path, $destination_path);

        foreach (range(1, 100) as $index) {
            $image = File::files($destination_path);
            $random_image = $image[array_rand($image)];
            $image_name = $random_image->getFilename();

            $title = $faker->realText($maxNbChars = 100, $indexSize = 2);

            \App\Models\Blog::create([
                'title' => $title,
                'content' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
                'slug' => \Str::slug($title),
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
                'image' => $image_name,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);

        }
    }
}
