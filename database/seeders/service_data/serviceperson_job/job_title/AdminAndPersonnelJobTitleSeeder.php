<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class AdminAndPersonnelJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitles = [
//            G1 Shop
            [
                'name'=>'General Staff 1 - Personal',
                'slug'=> 'G1',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 1 - Personal',
                'slug'=> 'S1',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],

//            Personnel
            [
                'name'=>'SO3 Personnel ',
                'slug'=> 'HRO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Human Resource Warrant Officer',
                'slug' => 'HR WO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name'=>'Human Resource Senior NCO',
                'slug'=> 'HR SNCO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name'=>'Human Resource Clerk',
                'slug'=> 'HR Clerk',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
//            Legal
            [
                'name'=>'SO3 Legal',
                'slug'=> 'G1-Legal',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Legal Warrant Officer',
                'slug' => 'Legal WO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Legal Senior NCO',
                'slug' => 'Legal SNCO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Legal Clerk',
                'slug' => 'Legal Clerk',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
//            Administration
            [
                'name' => 'Chief Clerk',
                'slug' => 'Chief Clerk',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Administrative Senior Non Commissioned Officer ',
                'slug' => 'Admin NCO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Clerk in-charge of dispatch',
                'slug' => 'IC Dispatch',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Clerk in-charge of Registry',
                'slug' => 'IC Registry',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Administrative Clerk',
                'slug' => 'Admin Clerk',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Clerk',
                'slug' => 'Clerk',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Typist',
                'slug' => 'Typist',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
//            Education
            [
                'name' => 'Education Warrant Officer',
                'slug' => 'Education WO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Education Senior NCO',
                'slug' => 'Education SNCO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Education Records NCO',
                'slug' => 'Education Records NCO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'Research and Development Senior SNCO',
                'slug' => 'R&D SNCO',
                'job_title_category_id' => 1,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
