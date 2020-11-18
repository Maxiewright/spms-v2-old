<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class CommandJobTitleSeeder extends Seeder
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
                'name'=>'Commanding Officer of the Regiment',
                'slug' => 'COTTR',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Brigade 2IC',
                'slug' => 'Brig 2IC',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Commanding Officer',
                'slug' => 'CO',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Battalion 2IC',
                'slug' => 'BN 2IC',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Officer Commanding',
                'slug' => 'OC',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Company 2IC',
                'slug' => 'Coy 2IC',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Platoon Commander',
                'slug' => 'Pl Comd',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
//            Command - OR
            [
                'name' => 'Platoon Sergeant',
                'slug'  => 'Pl Sgt',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name' => 'Section Commander',
                'slug'  => 'Sect Comd',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name' => 'Section 2IC',
                'slug'  => 'Sect 2IC',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
            [
                'name'=>'Team Leader',
                'slug' => 'TM Ldr',
                'job_title_category_id' => 3,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
