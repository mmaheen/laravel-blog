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

        foreach (range(1,100) as $index){
            $images = File::files($destination_path);
            $random_image = $images[array_rand($images)];
            $image_name = $random_image->getFilename();

            \App\Models\Photo::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Random user
                'image' => $image_name,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id, // Random category
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }

    }
}
