<?php

namespace Modules\Leave\Entities;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveAdjustment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'leave_id',
        'leave_adjustment_reason_id',
        'ended_on',
        'adjusted_by',
        'remarks'
    ];

    protected $dates = ['ended_on'];
    /**
     * Returns leave relationship
     *
     * @return BelongsTo
     */
    public function leave()
    {
        return $this->belongsTo(Leave::class);
    }

    public function adjustmentReason()
    {
        return $this->belongsTo(LeaveAdjustmentReason::class);
    }

    public function adjuster()
    {
        return $this->belongsTo(Serviceperson::class, 'adjusted_by');
    }


    /**
     * Calculates days refunded.
     *
     * @return mixed
     */
    public function daysRefunded()
    {
        $dateCameOff = $this->ended_on;
        $originalLeaveEnd = $this->leave->ended_on;
        return $dateCameOff->diffInDays($originalLeaveEnd);
    }
}
