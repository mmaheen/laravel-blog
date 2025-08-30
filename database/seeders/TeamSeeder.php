<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        foreach (range(1, 100) as $index) {
            \App\Models\Team::create([
                'user_id' => $index,
                'designation' => $faker->jobTitle(),
                'bio' => $faker->realText(100),
            ]);
        }
    }
}
