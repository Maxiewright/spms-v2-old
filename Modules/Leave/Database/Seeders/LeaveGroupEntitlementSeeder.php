<?php


namespace Modules\Leave\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Leave\Entities\LeaveGroupEntitlement;

class LeaveGroupEntitlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leaveGroupEntitlements = [
//            Officers
            [
                'leave_type_id' => 1,
                'leave_group_id' => 1,
                'days_entitled' => 42,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 2,
                'leave_group_id' => 1,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 3,
                'leave_group_id' => 1,
                'days_entitled' => 14,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 4,
                'leave_group_id' => 1,
                'days_entitled' => 28,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 5,
                'leave_group_id' => 1,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 6,
                'leave_group_id' => 1,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 7,
                'leave_group_id' => 1,
                'days_entitled' => 98,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 8,
                'leave_group_id' => 1,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],

//            Enlisted

            [
                'leave_type_id' => 1,
                'leave_group_id' => 2,
                'days_entitled' => 30,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 2,
                'leave_group_id' => 2,
                'days_entitled' => 14,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 3,
                'leave_group_id' => 2,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 4,
                'leave_group_id' => 2,
                'days_entitled' => 28,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 5,
                'leave_group_id' => 2,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 6,
                'leave_group_id' => 2,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 7,
                'leave_group_id' => 2,
                'days_entitled' => 98,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
            [
                'leave_type_id' => 8,
                'leave_group_id' => 2,
                'days_entitled' => 7,
                'can_accrue'    => false,
                'max_accrued_days' => null
            ],
        ];

        LeaveGroupEntitlement::insert($leaveGroupEntitlements);
    }
}
