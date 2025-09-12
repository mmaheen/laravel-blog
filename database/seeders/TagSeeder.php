<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            'laravel',
            'vue',
            'backend',
            'frontend',
            'api',
            'authentication',
            'design',
            'seo',
            'productivity',
            'self-care',
            'travel',
            'recipes',
            'fitness',
            'mental-health',
            'branding',
            'marketing',
            'debugging',
            'tutorial',
            'tips',
            'inspiration'
        ];
        foreach ($tags as $tag) {
            \App\Models\Tag::create([
                'name' => $tag,
                'slug' => \Str::slug($tag),
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
