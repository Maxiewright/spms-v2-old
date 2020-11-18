<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class ProjectsJobTitleSeeder extends Seeder
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
                'name'=>'General Staff 5 - Projects',
                'slug'=> 'G5',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 5 - Projects',
                'slug'=> 'S5',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Projects Warrant Officer',
                'slug' => 'Projects WO',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Projects Senior NCO',
                'slug' => 'Projects SNCO',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Project Manager',
                'slug' => 'Project Manager',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Project Planner',
                'slug' => 'Project Planner',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Draughtsman',
                'slug' => 'Draughtsman',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Project Evaluator and Auditor',
                'slug' => 'Project Evaluator and Auditor',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],
            [
                'name' => 'Project Site Investigator',
                'slug' => 'Project Site Investigator',
                'job_title_category_id' => 15,
                'created_at' => now(),
            ],

        ];

        JobTitle::insert($jobTitles);
    }
}
