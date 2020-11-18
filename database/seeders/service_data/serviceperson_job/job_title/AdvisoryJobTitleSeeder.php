<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class AdvisoryJobTitleSeeder extends Seeder
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
                'name' => 'Command Sergeant Major',
                'slug' => 'Comd',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'Regimental Sergeant Major',
                'slug' => 'RSM',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'Company Sergeant Major',
                'slug' => 'CSM',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'Detachment Sergeant Major',
                'slug' => 'DSM',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'Field Squadron Sergeant Major',
                'slug' => 'FSSM',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'Sergeant Major of the Special Forces',
                'slug' => 'SFSM',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'Band Sergeant Major',
                'slug' => 'BSM',
                'job_title_category_id' => 2,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
