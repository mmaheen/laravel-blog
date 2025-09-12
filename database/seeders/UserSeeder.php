<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@test.com',
            // 'role' => 'admin',
            'image' => 'person-m-12.webp',
            'password' => '0'
        ]);

        User::factory()->create([
            'name' => 'Test Client',
            'email' => 'client@test.com',
            // 'role' => 'client',
            'image' => 'person-f-9.webp',
            'password' => '0'
        ]);

        $faker = \Faker\Factory::create();

        $source_path = public_path('assets/frontend/img/person');
        $destination_path = public_path('uploads/users');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path, $destination_path);

        foreach (range(1, 50) as $index) {
            $images = File::files($destination_path);
            $random_image = $images[array_rand($images)];
            $image_name = $random_image->getFilename();

            User::factory()->create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => $faker->password(),
                // 'role' => $faker->randomElement(['admin', 'client']),
                'image' => $image_name,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
