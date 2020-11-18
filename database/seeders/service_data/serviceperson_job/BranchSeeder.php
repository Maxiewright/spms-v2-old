<?php
namespace Database\Seeders\service_data\serviceperson_job;

use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name' => 'Operations',
                'slug' => 'Ops',
            ],
            [
                'name' => 'Personnel and Administration',
                'slug' => 'Admin',
            ],
            [
                'name' => 'Logistics',
                'slug' => 'Logs',
            ],
            [
                'name' => 'Engineer',
                'slug' => 'Eng',
            ]

        ];
        Branch::insert($branches);
    }

}
