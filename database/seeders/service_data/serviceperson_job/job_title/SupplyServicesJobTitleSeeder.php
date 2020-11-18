<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class SupplyServicesJobTitleSeeder extends Seeder
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
                'name' => 'Armourer',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Bn Arms NCO',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Cobbler',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Floor Manager Tailor Shop',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Master Tailor',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Ordinance Tehnician',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Ordinance SNCO',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Cobbler Shop SNCO',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Ammo Tech SNCO',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'SNCO IC Tailors & Cobblers',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Tailor Shop SNCO',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Snr Cutter Tailor Shop',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Tailors',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Regimental Armourer',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],

            [
                'name' => 'Bn PRI',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Canteen Orderly',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Coordinating / Auditing SNCO',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'Corporals Club Orderly',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],

            [
                'name' => 'NCO IC Corporals Club',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
            [
                'name' => 'PRI Canteen Orderly',
                'slug' => null,
                'job_title_category_id' => 18,
                'created_at' => now(),
            ],
        ];
        JobTitle::insert($jobTitles);
    }
}
