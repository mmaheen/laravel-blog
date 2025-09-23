<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            "Animals",
            "Mammals",
            "Birds",
            "Reptiles",
            "Amphibians",
            "Fish",
            "Insects",
            "Food",
            "Fruits",
            "Vegetables",
            "Grains",
            "Dairy",
            "Meat",
            "Seafood",
            "Snacks",
            "Clothing",
            "Tops",
            "Bottoms",
            "Dresses",
            "Outerwear",
            "Footwear",
            "Accessories",
            "Technology",
            "Computers",
            "Smartphones",
            "Tablets",
            "Wearables",
            "Cameras",
            "Sports",
            "Soccer",
            "Basketball",
            "Tennis",
            "Golf",
            "Swimming",
            "Running",
            "Movies",
            "Action",
            "Comedy",
            "Drama",
            "Horror",
            "Sci-Fi",
            "Documentary",
            "Music",
            "Pop",
            "Rock",
            "Jazz",
            "Classical",
            "Hip-hop",
            "Country",
            "Preschool",
            "Elementary",
            "High School",
            "College",
            "Vocational Training",
            "Travel",
            "Beach Destinations",
            "Mountain Destinations",
            "Urban Destinations",
            "Adventure Travel",
            "Books",
            "Fiction",
            "Non-fiction",
            "Mystery",
            "Fantasy",
            "Biography",
            "Poetry",
            "Art",
            "Painting",
            "Sculpture",
            "Photography",
            "Digital Art",
            "Street Art",
            "Hobbies",
            "Gardening",
            "Cooking",
            "Knitting",
            "Woodworking",
            "Gaming",
            "Health",
            "Exercise",
            "Nutrition",
            "Mental Health",
            "Preventive Care",
            "Chronic Conditions",
            "Home",
            "Interior Design",
            "Furniture",
            "Appliances",
            "Kitchenware",
            "Bedding",
            "Industry",
            "Automotive",
            "Aerospace",
            "Healthcare",
            "Retail",
            "Manufacturing",
            "People",
            "Children",
            "Teenagers",
            "Adults",
            "Seniors",
            "Families",
            "Entrepreneurs",
            "University",
            "Faculties",
            "Arts",
            "Humanities",
            "Business",
            "Law",
            "IT",
            "Drinks",
            "Water",
            "Tea",
            "Coffee",
            "Juice",
            "Soda",
            "Smoothies",
            "Alcoholic Beverages",
            "Jobs",
            "Education",
            "Finance",
            "Engineering",
            "Marketing"
        ];

        $faker = \Faker\Factory::create();

        $source_path = public_path('assets/frontend/img/clients');
        $destination_path = public_path('uploads/categories');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path, $destination_path);

        foreach ($categories as $category) {
            $image = File::files($destination_path);
            $random_image = $image[array_rand($image)];
            $image_name = $random_image->getFilename();

            \App\Models\Category::create([
                'name' => $category,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'slug' => \Str::slug($category) . '-' . uniqid(),
                'image' => $image_name,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }

    }
}
