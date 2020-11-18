<?php
namespace Database\Seeders\service_data\serviceperson_job\job_title;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Illuminate\Database\Seeder;

class MuscialJobTitleSeeder extends Seeder
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
                'name' => 'Bugle Corporal',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Bugle Sergeant',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Drum Corporal',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Drum Major',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Drum Sergeant',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Drummer',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Band Admin SNCO',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Band Librarian',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Bandmaster',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Bandsman',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Dance Band Warrant Officer',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Musical Arranger',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'SNCO IC Instruments',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Electronics  SNCO',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
            [
                'name' => 'Instrument Repairman',
                'slug' => null,
                'job_title_category_id' => 12,
                'created_at' => now(),
            ],
        ];

        JobTitle::insert($jobTitles);
    }
}
