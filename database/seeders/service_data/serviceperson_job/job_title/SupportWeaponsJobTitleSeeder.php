<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class SupportWeaponsJobTitleSeeder extends Seeder
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
                'name' => 'Mortarman',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Section Gunner Sergeant',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Section Mortar Sergeant',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Support Weapons Detachment Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Ammo Carrier',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Anti Armour Gunner',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],

            [
                'name' => 'Assistant Mortar Fire Controller',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Control Post Operator',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Gunner',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Machine Gun Controller',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Mortar Fire Controller',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
            [
                'name' => 'Weapon Sec Leader',
                'slug' => null,
                'job_title_category_id' => 19,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
