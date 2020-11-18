<?php

namespace Database\Seeders\qualification\education\school;

use App\Models\System\Serviceperson\Qualifications\Education\SchoolLevel;
use Illuminate\Database\Seeder;

class SchoolLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'name' => 'Primary',
                'created_at' => now(),
            ],
            [
                'name' => 'Secondary',
                'created_at' => now(),
            ],
            [
                'name' => 'Post-Secondary',
                'created_at' => now(),
            ],
            [
                'name' => 'Tertiary',
                'created_at' => now(),
            ],
        ];

        SchoolLevel::insert($levels);
    }
}
