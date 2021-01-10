<?php


namespace Modules\Leave\Services;


use Modules\Leave\Entities\Leave;
use Modules\Leave\Entities\LeaveEntitlement;

class LeaveService
{

    /**
     * Count leave by serviceperson and type
     * @param $serviceperson
     * @param $type
     * @return float|int
     */
    public static function leaveCount($serviceperson, $type)
    {
        // given that we have a leave of a give type
        $servicepersonLeave = Leave::query()
            ->where('serviceperson_number', $serviceperson)
            ->where(function ($query) use ($type) {
                $query->where('leave_type_id', $type);
            })
            ->get();

        $leaveInDays = [];
        foreach ($servicepersonLeave as $key => $leave) {
            $leaveInDays[] = $leave->start_on->diffIndays($leave->end_on);
        }

        return array_sum($leaveInDays);

    }

    public static function entitlementCount($serviceperson, $type, $group)
    {
        $servicepersonEntitlement = LeaveEntitlement::query()
            ->with('leaveGroupEntitlement')
            ->where('serviceperson_number', $serviceperson)
            ->whereHas('leaveGroupEntitlement', function ($query) use ($type, $group) {
                $query->where('leave_type_id', $type);
                $query->where('leave_group_id', $group);
            })
            ->get();

        $entitlementInDays = [];
        foreach ($servicepersonEntitlement as $entitlement) {
            $entitlementInDays[] = $entitlement->leaveGroupEntitlement->days_entitled;
        }

        return array_sum($entitlementInDays);
    }


}
