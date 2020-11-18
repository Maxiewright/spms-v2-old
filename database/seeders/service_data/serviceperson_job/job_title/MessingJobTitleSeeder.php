<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class MessingJobTitleSeeder extends Seeder
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
                'name' => 'Messing Officer',
                'slug' => 'Messing Offr',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Ration Stores Warrant Officer',
                'slug' => 'Ration Stores WO',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Regimental Master Cook',
                'slug' => 'Regimental Master Cook',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Regimental Mess Manager',
                'slug' => 'Regimental Mess Manager',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Master Cook',
                'slug' => 'Master Cook',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Catering Senior NCO',
                'slug' => 'Catering SNCO',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Cookhouse Senior NCO',
                'slug' => 'Cookhouse SNCO',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Dinning Hall NCO',
                'slug' => 'Dinning Hall NCO',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Cook',
                'slug' => 'Cook',
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Issuing Sergeant',
                'slug' => null,
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Mess Manager',
                'slug' => null,
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Mess Steward',
                'slug' => null,
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Ration Stores NCO',
                'slug' => null,
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],
            [
                'name' => 'Regiment Chief Steward',
                'slug' => null,
                'job_title_category_id' => 11,
                'created_at' => now(),
            ],

        ];

        JobTitle::insert($jobTitles);
    }
}
