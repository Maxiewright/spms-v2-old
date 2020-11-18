<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class QuartermasterJobTitleSeeder extends Seeder
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
                'name' => 'Warehousing SNCO',
                'slug' => null,
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
            [
                'name' => 'Quartermaster Sergeant',
                'slug' => 'QM Sgt',
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
            [
                'name' => 'Clothing & Equipment SNCO',
                'slug' => null,
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
            [
                'name' => 'Disposals SNCO',
                'slug' => null,
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
            [
                'name' => 'Expendables SNCO',
                'slug' => null,
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
            [
                'name' => 'NCO IC Stores',
                'slug' => null,
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
            [
                'name' => 'Storeman',
                'slug' => 'Storeman',
                'job_title_category_id' => 16,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
