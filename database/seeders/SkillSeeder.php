<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Skill::create([
            'title' => 'Laravel',
            'percentage' => 90
        ]);

        Skill::create([
            'title' => 'HTML',
            'percentage' => 85
        ]);

        Skill::create([
            'title' => 'JavaScript',
            'percentage' => 65
        ]);

        Skill::create([
            'title' => 'CSS',
            'percentage' => 55
        ]);

        Skill::create([
            'title' => 'Vue js',
            'percentage' => 65
        ]);
    }
}
