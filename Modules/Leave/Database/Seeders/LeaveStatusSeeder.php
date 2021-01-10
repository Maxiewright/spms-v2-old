<?php

namespace Modules\Leave\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Leave\Entities\LeaveStatus;

class LeaveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $leaveStatuses =  [
                [
                    'name' => 'Pending',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Scheduled',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Approved',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Rejected',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Canceled',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Taken',
                    'description' => null,
                    'created_at' => now(),
                ],
            ];

            LeaveStatus::insert($leaveStatuses);
        }
    }

}
