<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LeaveRefunded extends Pivot
{
//    protected $table = ['leave_refunded'];

    public function adjustment()
    {
        return $this->belongsTo(LeaveAdjustment::class);
    }

    public function entitlement(){
        return $this->belongsTo(LeaveEntitlement::class);
    }
}
