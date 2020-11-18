<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class TransportJobTitleSeeder extends Seeder
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
                'name' => 'Despatch Rider',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Bn MT Sergeant',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Escort',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Driver',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Dispatch Rider',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Dispatch SNCO',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Fleet Manager',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Mechanical Transport Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
            [
                'name' => 'Dispatch NCO',
                'slug' => null,
                'job_title_category_id' => 20,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
