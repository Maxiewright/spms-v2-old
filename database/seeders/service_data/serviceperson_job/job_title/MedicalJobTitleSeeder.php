<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class MedicalJobTitleSeeder extends Seeder
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
                'name' => 'Lab Technician',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Medical Assistant',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'MIR Sergeant',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Pharmaceuticals Manager',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Phlebotomy SNCO',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Regt WO IC MIR',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'RN Senior Medical NCO',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'SNCO IC Medical Stores',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'WO IC Medical Inspection Room SSB',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Child Care Specialist',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Medical Social Worker (to include Claims)',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'MWR Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Social Worker',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Medic',
                'slug' => null,
                'job_title_category_id' => 10,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
