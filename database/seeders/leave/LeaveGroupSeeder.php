<?php
namespace Database\Seeders\leave;

use App\Models\Leave\LeaveGroup;
use Illuminate\Database\Seeder;

class LeaveGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $leaveGroups =  [
                [
                    'name' => 'Officer',
                    'slug' => 'Offr',
                    'created_at' => '2020-03-11 07:20:00',
                ],
                [
                    'name' => 'Enlisted',
                    'slug' => 'OR',
                    'created_at' => '2020-03-11 07:20:00',
                ],
            ];

          LeaveGroup::insert($leaveGroups);
        }
    }
}
