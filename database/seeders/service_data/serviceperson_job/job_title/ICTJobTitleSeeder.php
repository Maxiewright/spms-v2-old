<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class ICTJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitles = [
//            Information Technology
            [
                'name'=>'General Staff 6 - Communication and Signals',
                'slug'=> 'G6',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 6 - Communication and Signals',
                'slug'=> 'S6',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name'=>'General Staff 6 - SO3 Communication and Signals',
                'slug'=> 'SO3 ICT',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Application Development Administrator',
                'slug' => 'App Dev Admin',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Application Development Technician',
                'slug' => 'App Dev',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Cyber Security Administrator',
                'slug' => 'Cyber Security Admin',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Cyber Security Technician',
                'slug' => 'Cyber Security Tech',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'ICT Manager',
                'slug' => 'ICT Manager',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'ICT Technician',
                'slug' => 'ICT Tech',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Jnr Administrator',
                'slug' => 'Jnr Admin',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Network & Cyber Security Administrator',
                'slug' => 'Network Security Admin',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Network Administrator',
                'slug' => 'Network Admin',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Regimental IT Warrant Officer',
                'slug' => 'ICT WO',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'System Administrator',
                'slug' => 'System Admin',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
//          Communication - Signals
            [
                'name' => 'Regimental Signals Officer',
                'slug' => 'RSO',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Regimental Signals Warrant Officer',
                'slug' => 'Signals WO',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Signals Quarter Master Sergeant',
                'slug' => 'Signals CQ',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Signals Senior NCO',
                'slug' => 'Signals SNCO',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Radio Technician',
                'slug' => 'Radio Tech',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'Signaller',
                'slug' => 'Signaller',
                'job_title_category_id' => 5,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
