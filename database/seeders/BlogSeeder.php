<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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

        File::ensureDirectoryExists($destination_path);
        File::cleanDirectory($destination_path);

        // Get all source images
        $source_images = File::files($source_path);

        if (empty($source_images)) {
            throw new \Exception('No source images found.');
        }

        foreach (range(1, 200) as $index) {
            // Pick a random image
            $random_image = $source_images[array_rand($source_images)];

            // Generate a unique name
            $extension = $random_image->getExtension();
            $new_name = 'blog_' . uniqid() . '.' . $extension;

            // Copy and rename the image
            File::copy($random_image->getRealPath(), $destination_path . '/' . $new_name);

            // Create blog entry
            $title = $faker->realTextBetween(50, 100);

            Blog::create([
                'title' => $title,
                'subtitle' => $faker->realText(150),
                'description' => $faker->realText(500),
                'image' => $new_name,
                'is_published' => $faker->boolean(),
                'slug' => Str::slug($title),
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
                'created_at' => $faker->dateTimeThisYear(),
            ]);
        }

    }
}
