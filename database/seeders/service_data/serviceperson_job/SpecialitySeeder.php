<?php
namespace Database\Seeders\service_data\serviceperson_job;

use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Specialty;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $specialties = [
//                6-2. HR
                [
                    'career_path_id' => 19,
                    'name' => 'Research and Development',
                    'slug' => 'R&D',
                ],
//                8-2. Social Services
                [
                    'career_path_id' => 23,
                    'name' => 'Moral Welfare and Recreation Services',
                    'slug' => 'Welfare',
                ],
                [
                    'career_path_id' => 23,
                    'name' => 'Civil Military Affairs / Public relations',
                    'slug' => 'PR',
                ],
//                10-1 Supply
                [
                    'career_path_id' => 27,
                    'name' => 'Planning, Financial, Accounts, Economics and President of the Regimental Institutes',
                    'slug' => 'Finance',
                ],
//                10-3 Material & Clothing Services
                [
                    'career_path_id' => 29,
                    'name' => 'Arms & Ammunition Services',
                    'slug' => 'Ammo Tech',
                ],
                [
                    'career_path_id' => 29,
                    'name' => 'Cobblers',
                    'slug' => 'Cobbler',
                ],
                [
                    'career_path_id' => 29,
                    'name' => 'Tailors',
                    'slug' => 'Tailor',
                ],
//                11-2 Drivers
                [
                    'career_path_id' => 31,
                    'name' => 'Light',
                    'slug' => 'Light Driver',
                ],
                [
                    'career_path_id' => 31,
                    'name' => 'Heavy',
                    'slug' => 'Heavy Driver',
                ],
                [
                    'career_path_id' => 31,
                    'name' => 'Extra Heavy',
                    'slug' => 'Extra Heavy Driver',
                ],
//                14-6 Health
                [
                    'career_path_id' => 43,
                    'name' => 'Facility Maintenance',
                    'slug' => 'Custodian',
                ],


            ];
            Specialty::insert($specialties);
        }
    }
}
