<?php
namespace Database\Seeders\service_data\serviceperson_job;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitleCategory;
use Illuminate\Database\Seeder;

class JobTitleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitleCategories = [
            [
                'name'=>'Administration and Personnel',
                'slug' => 'Admin & Personnel',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Advisory',
                'slug' => 'Advisory',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Command',
                'slug' => 'Command',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Engineers',
                'slug' => 'Engr',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Information Communication Technology',
                'slug' => 'ICT',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Infantry',
                'slug' => 'Inf',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Intelligence',
                'slug' => 'Intel',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Logistics and Finance',
                'slug' => 'Logs & Finance',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Maintenance',
                'slug' => 'Maintenance',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Medical',
                'slug' => 'Medical',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Messing',
                'slug' => 'Messing',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Musical',
                'slug' => 'Musical',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Operations and Training',
                'slug' => 'Ops & Trg',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Public Relations',
                'slug' => 'PR',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Plans and Project',
                'slug' => 'Projects',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Quartermaster',
                'slug' => 'QM',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Special Forces',
                'slug' => 'SF',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Supply Services',
                'slug' => 'Supply Services',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Support Weapons',
                'slug' => 'Support Weapons',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name'=>'Transport',
                'slug' => 'Transport',
                'description' => null,
                'created_at' => now()
            ],
        ];
        JobTitleCategory::insert($jobTitleCategories);
    }
}
