<?php

namespace Modules\Leave\Traits;

use Modules\Leave\Entities\Leave;
use Modules\Leave\Entities\LeaveAdjustment;
use Modules\Leave\Entities\LeaveEntitlement;
use Modules\Leave\Services\LeaveService;

trait HasLeave
{
    /**
     * returns leave for serviceperson
     *
     * @return mixed
     */
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }

    /**
     * returns leave entitlement
     * @return mixed
     */
    public function leaveEntitlements()
    {
        return $this->hasMany(LeaveEntitlement::class);
    }

    /**
     * return leave applications / schedule created
     *
     * @return mixed
     */
    public function leaveCreations()
    {
        return $this->hasMany(Leave::class, 'created_by');
    }
    /**
     * return leave approvals
     *
     * @return mixed
     */
    public function leaveApprovals()
    {
        return $this->hasMany(Leave::class, 'approved_by');
    }

    /**
     * returns leave adjustments made
     *
     * @return mixed
     */
    public function leaveAdjustments()
    {
        return $this->hasMany(LeaveAdjustment::class, 'adjusted_by');
    }

    /**
     * Returns all annual leave count of a given type in days
     * @param $type
     * @return float|int
     */
    public function leaveCount($type)
    {
        return LeaveService::leaveCount($this->number, $type);
    }

    /**
     * Returns all annual leave count of a given type in days
     * @param $type
     * @return float|int
     */
    public function entitlementCount($type)
    {
     $this->enlisted()
         ? $group = 1
         : $group = 2;

        return  LeaveService::entitlementCount($this->number, $type, $group);
    }






}
