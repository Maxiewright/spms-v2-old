<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class IntelligenceJobTitleSeeder extends Seeder
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
                'name'=>'General Staff 2 - Intelligence',
                'slug'=> 'G2',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 2 - Intelligence',
                'slug'=> 'S2',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Records & Investigation Senior NCO',
                'slug' => 'Records & Investigation SNCO',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Intelligence Warrant Officer',
                'slug' => 'Intel WO',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Intelligence Senior NCO',
                'slug' => 'Intel SNCO',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Investigation Sergeant',
                'slug' => null,
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Military Investigators',
                'slug' => null,
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Intelligence Operator',
                'slug' => 'Intel Operator',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],

            [
                'name' => 'Intelligence analyst',
                'slug' => 'Intel Analyst',
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],


//            Provost

            [
                'name' => 'Provost',
                'slug' => null,
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Provost Sergeant',
                'slug' => null,
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Provost SNCO',
                'slug' => null,
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'Provost Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 7,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
