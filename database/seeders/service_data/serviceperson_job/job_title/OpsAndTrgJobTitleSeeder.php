<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class OpsAndTrgJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitles = [
//            Operations
            [
                'name'=>'General Staff 3 - Operations',
                'slug'=> 'G3',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 3 - Operations',
                'slug'=> 'S3',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Operations Warrant Officer',
                'slug' => 'Ops WO',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Operations SNCO',
                'slug' => 'Operations SNCO',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],

            //            Training
            [
                'name' => 'Plans & Training SNCO',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Plans & Training Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Academy Training Warrant',
                'slug' => 'Academy Trg WO',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],

            [
                'name' => 'Regimental Drill Sergeant',
                'slug' => 'Regimental Drill Sergeant',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Training Warrant Officer',
                'slug' => 'Trg WO',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Weapons Training Warrant Officer',
                'slug' => 'WTWO',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Weapon Training Senior Instructor',
                'slug' => 'WTSI',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Senior Instructor',
                'slug' => 'Snr Inst',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Demonstrator',
                'slug' => 'Demo Inst',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Doctrine, Experimentation & Drills SNCO',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Doctrine, Experimentation and Drills WO',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'G3 Operations Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Operations NCO',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Research NCO',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Training & Laison Sergeant',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Physical Training Warrant Officer',
                'slug' => 'PTWO',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Physical Training Instructor',
                'slug' => 'PTI',
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
            [
                'name' => 'Training SNCO',
                'slug' => null,
                'job_title_category_id' => 13,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
