<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class LogsAndFinanceJobTitleSeeder extends Seeder
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
                'name'=>'General Staff 4 - Logistics and Finance',
                'slug'=> 'G4',
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 4 - Logistics and Finance',
                'slug'=> 'S4',
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Purchasing Sergeant',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Logistics Senior NCO',
                'slug' => 'Logs SNCO',
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Supply & Financial Management Clerk',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Auditing Sergeant',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Procurement Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Finance and Auditing Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Finance Sergeant',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Logistics Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Procurement Clerk',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'SNCO IC Purchasing Staff (PMOSS)',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'Logistics SNCO',
                'slug' => null,
                'job_title_category_id' => 8,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
