<?php

namespace Modules\Leave\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Leave\Entities\LeaveAdjustmentReason;

class LeaveAdjustmentReasonSeeder extends Seeder
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
                    'name' => 'Called Off',
                    'description' => 'Offr',
                    'created_at' => now(),
                ],
                [
                    'name' => 'Sickness',
                    'description' => null,
                    'created_at' => now(),
                ],

            ];

            LeaveAdjustmentReason::insert($leaveGroups);
        }
    }

}
