<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('skills')->insert([
            ['title' => 'Laravel', 'percentage' => 70],
            ['title' => 'PHP', 'percentage' => 75],
            ['title' => 'JavaScript', 'percentage' => 70],
            ['title' => 'HTML', 'percentage' => 90],
            ['title' => 'CSS', 'percentage' => 85],
        ]);
    }
}
