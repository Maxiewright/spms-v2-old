<?php

namespace Database\Seeders\qualification\education\school;

use App\Models\System\Serviceperson\Qualifications\Education\School;
use Illuminate\Database\Seeder;

class UniversitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = [
            [
                'name' => 'The University of the West Indies',
                'slug' => 'UWI',
                'school_level_id' => 4,
                'school_type_id' => 11,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'The University of Trinidad and Tobago',
                'slug' => 'UTT',
                'school_level_id' => 4,
                'school_type_id' => 11,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'UWI School of Business and Applied Studies Limited',
                'slug' => 'UWI-ROYTEC',
                'school_level_id' => 4,
                'school_type_id' => 11,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'The University of the Southern Caribbean',
                'slug' => 'USC',
                'school_level_id' => 4,
                'school_type_id' => 11,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
        ];

        School::insert($universities);
    }
}
