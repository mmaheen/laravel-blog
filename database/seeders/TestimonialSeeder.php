<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            \App\Models\Testimonial::create([
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'rating' => $faker->numberBetween(1, 5),
                'comment' => $faker->realTextBetween(100, 150),
            ]);
        }
    }
}
