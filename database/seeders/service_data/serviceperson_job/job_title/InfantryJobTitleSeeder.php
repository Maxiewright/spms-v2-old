<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class InfantryJobTitleSeeder extends Seeder
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
                'name' => 'Coy Runner',
                'slug' => null,
                'job_title_category_id' => 6,
                'created_at' => now(),
            ],
            [
                'name' => 'Machine Gunner(Gun Team)',
                'slug' => null,
                'job_title_category_id' => 6,
                'created_at' => now(),
            ],
            [
                'name' => 'Ammo Bearer(Gun Team)',
                'slug' => null,
                'job_title_category_id' => 6,
                'created_at' => now(),
            ],
            [
                'name' => 'Rifleman',
                'slug' => null,
                'job_title_category_id' => 6,
                'created_at' => now(),
            ],
            [
                'name' => 'Assistant Control Post Operator',
                'slug' => null,
                'job_title_category_id' => 6,
                'created_at' => now(),
            ],
            [
                'name' => 'Assistant Gunner',
                'slug' => null,
                'job_title_category_id' => 6,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
