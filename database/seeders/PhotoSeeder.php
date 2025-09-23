<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        $source_path = public_path('assets/frontend/img/portfolio');
        $destination_path = public_path('uploads/photos');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path, $destination_path);

        foreach (range(1, 200) as $index) {
            $images = File::files($destination_path);
            $random_image = $images[array_rand($images)];
            $image_name = $random_image->getFilename();

            $title = $faker->realTextBetween(50, 100);

            \App\Models\Photo::create([
                'title' => $title,
                'description' => $faker->realText($maxNbChars = 500, $indexSize = 4),
                'image' => $image_name,
                'is_published' => $faker->boolean(),
                'slug' => \Str::slug($title) . '-' . uniqid(),
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
                'created_at' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
