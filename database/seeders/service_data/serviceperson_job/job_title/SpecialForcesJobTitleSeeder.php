<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class SpecialForcesJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitles = [
            [
                'name' => 'Radio Operator',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Team Commander',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Operations Sergeant',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Recorder',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Scout',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Navigator',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Training Sergeant',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Sniper',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Spotter',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Breacher',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
            [
                'name' => 'Entryman',
                'slug' => null,
                'job_title_category_id' => 17,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
