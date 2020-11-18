<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class PRJobTitleSeeder extends Seeder
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
                'name'=>'General Staff 7 - Public Affairs',
                'slug'=> 'G7',
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name'=>'Support Staff 7 - Public Affairs',
                'slug'=> 'S7',
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Public Relations Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Audio Visual Technician',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Creative Media Production',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Editor Print, Audio & Electric Media & Regiment Archives ',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Journalist',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Protocol Specialist',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],
            [
                'name' => 'Snr Journalist',
                'slug' => null,
                'job_title_category_id' => 14,
                'created_at' => now(),
            ],

        ];

        JobTitle::insert($jobTitles);
    }
}
