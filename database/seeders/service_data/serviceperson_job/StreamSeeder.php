<?php
namespace Database\Seeders\service_data\serviceperson_job;

use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Illuminate\Database\Seeder;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        Streams
        {
            $streams = [
//              1.  Operations
                [
                    'branch_id' => 1,
                    'name' => 'Combat / Combat Support',
                    'slug' => 'Combat Spt',
                ],
                [
                    'branch_id' => 1,
                    'name' => 'Operations',
                    'slug' => 'Ops',
                ],
                [
                    'branch_id' => 1,
                    'name' => 'Intelligence',
                    'slug' => 'Intel',
                ],
                [
                    'branch_id' => 1,
                    'name' => 'Special Forces Operations Detachment',
                    'slug' => 'SFOD',
                ],
                [
                    'branch_id' => 1,
                    'name' => 'Provost, War Dogs & Investigations',
                    'slug' => 'Provost',
                ],
//              2.  Personnel and administration
                [
                    'branch_id' => 2,
                    'name' => 'Clerical, Legal and Human Resource',
                    'slug' => 'HR',
                ],
                [
                    'branch_id' => 2,
                    'name' => 'Information Communication Technology',
                    'slug' => 'ICT',
                ],
                [
                    'branch_id' => 2,
                    'name' => 'Health and Human Services',
                    'slug' => 'HHS',
                ],
                [
                    'branch_id' => 2,
                    'name' => 'Musical',
                    'slug' => 'Musical',
                ],
//             3.   Logistics
                [
                    'branch_id' => 3,
                    'name' => 'Supply Services',
                    'slug' => 'Supply',
                ],
                [
                    'branch_id' => 3,
                    'name' => 'Transportation',
                    'slug' => 'MT',
                ],
                [
                    'branch_id' => 3,
                    'name' => 'Food abd Catering Services',
                    'slug' => 'Messing',
                ],
//             4.   Engineer
                [
                    'branch_id' => 4,
                    'name' => 'Engineer Artisan',
                    'slug' => 'Artisan',
                ],
                [
                    'branch_id' => 4,
                    'name' => 'Engineer Specialist',
                    'slug' => 'Engr Specialist',
                ],
                [
                    'branch_id' => 4,
                    'name' => 'Engineer Technician',
                    'slug' => 'Engr Tech',
                ],
            ];
            Stream::insert($streams);
        }
    }
}
