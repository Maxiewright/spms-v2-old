<?php

namespace Database\Seeders\qualification\education\school;

use App\Models\System\Serviceperson\Qualifications\Education\School;
use Illuminate\Database\Seeder;

class CollegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colleges = [
            [
                'name' => 'Arthur Lok Jack Global School of Business',
                'slug' => 'Arthur Lok Jack',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'Caribbean Nazarene College',
                'slug' => 'CNC',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'Cipriani College of Labour and Co-operative Studies',
                'slug' => 'CCLCS',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'College of Science, Technology & Applied Arts of Trinidad & Tobago',
                'slug' => 'COSTAATT',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'West Indies School of Theology',
                'slug' => 'WIST',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'College of Health Environmental and Safety Studies Limited',
                'slug' => 'CHESS',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'College of Legal Studies Limited- The Legal Eagle Limited',
                'slug' => 'CLS',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'College of Ultrasound Sciences Limited',
                'slug' => 'COUS',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'CTS College of Business and Computer Science Limited',
                'slug' => 'CTS',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'School of Accounting and Management',
                'slug' => 'SAM Caribbean Limited',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => ' School of Business and Computer Science Limited',
                'slug' => 'SBCS',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'West Indies School of Theology Limited',
                'slug' => 'WIST',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
            [
                'name' => 'St. Andrew’s Theological College Limited',
                'slug' => 'SATC',
                'school_level_id' => 4,
                'school_type_id' => 10,
                'school_district_id' => 9,
                'description' => '',
                'created_at' => now(),
            ],
        ];

        School::insert($colleges);
    }


}
