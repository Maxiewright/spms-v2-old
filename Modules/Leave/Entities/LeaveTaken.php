<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use phpDocumentor\Reflection\Types\This;

class LeaveTaken extends Pivot
{


    protected static function boot()
    {
        parent::boot();
        static::retrieved(function ($leaveTaken){
            if ($this->leave->start_on >= now()){
                // calculate the difference between the leave stat day and leave end date
                $leaveTaken->days_taken = $this->leave->start_on->diffInDays($this->leave->end_on);
                // store it in the days_taken column of the leave_take database
            }
//            $leaveTaken->days_taken = self::daysTaken();
        });


    }


//    Leave Taken

        // if leave is approved
        // and leave start date >= now()
        // Create LeaveTaken Record
            // Take entitlement_id where (leave->start_on->year == entitlement->year)
        // generate days taken for that period
                // . leave->start_on->diffInDays(leave->end_on)

    public function leave()
    {
        return $this->belongsTo(Leave::class);
    }

    public function entitlement()
    {
        return $this->belongsTo(LeaveEntitlement::class);
    }

}
