<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class MaintainanceJobTitleSeeder extends Seeder
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
                'name' => 'Area Supervisor',
                'slug' => null,
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'Health, Safety, Security and Environment Senior NCO',
                'slug' => 'HSSE SNCO',
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'Maintenance Senior NCO',
                'slug' => 'Maintenance SNCO',
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'Health, Safety, Security and Environment Warrant Officer',
                'slug' => 'HSE WO',
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'Health, Safety, Security and Environment Personnel',
                'slug' => 'HSE Rep',
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'Maintenance NCO',
                'slug' => 'Maintenance NCO',
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'NCO IC Sanitation',
                'slug' => null,
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'R&D Safety Staff Sergeant',
                'slug' => null,
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
            [
                'name' => 'Tool Maintenance',
                'slug' => null,
                'job_title_category_id' => 9,
                'created_at' => now(),
            ],
        ];
        JobTitle::insert($jobTitles);
    }
}
