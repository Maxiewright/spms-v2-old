<?php

namespace Modules\Leave\Entities;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Leave\Database\Factories\LeaveFactory;
use Modules\Leave\Services\LeaveService;

class Leave extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'serviceperson_number',
        'leave_type_id',
        'start_on',
        'end_on',
        'leave_status_id',
        'created_by',
    ];


    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return LeaveFactory::new();
    }

    protected $dates = [
        'start_on', 'end_on', 'approved_at'
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($leave) {
            $entitlement = LeaveEntitlement::where('year', $leave->start_on->year)->id;
            $daysTaken = $leave->start_on->diffInDays($leave->end_on);

            if ($leave->status->name == 'Approve') {
                //  Set Approval date
                $leave->approved_at = now();
                // Attach Day Taken
                $leave->entitlement->attach($entitlement, ['daysTaken' => $daysTaken]);
            } else {
                $leave->entitlement->detach($entitlement);
            }

        });
////        TODO::Add authId to identify the approver of the leave when status is changed
////        i.e. $leave->approved_by == auth()->user()->id
////        TODO::Add function to identify the creator of the leave request
    }



//    Leave Taken

    // if leave is approved
    // and leave start date >= now()
    // take entitlement id where leave start date year == entitlement->year
    // generate days take for that period
    // . leave->start_on->diffInDays(leave->end_on)


    /**
     * Returns leave period in days
     */
    public function getDaysAttribute()
    {
        return $this->start_on->diffIndays($this->end_on);
    }

    /**
     * Return serviceperson to whom the leave belongs
     *
     * @return BelongsTo
     */
    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    /**
     * Return serviceperson who created leave
     *
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(Serviceperson::class, 'created_by');
    }

    /**
     * Return serviceperson who approved leave
     *
     * @return BelongsTo
     */
    public function approver()
    {
        return $this->belongsTo(Serviceperson::class, 'approved_by');
    }

    /**
     * leave type
     *
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(LeaveType::class);
    }

    /**
     * Leave Status
     *
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(LeaveStatus::class);
    }

    /**
     * Leave comments
     *
     * @return MorphMany
     */
    public function remarks()
    {
        return $this->morphMany(Remark::class, 'remarkable');
    }

    /**
     * Returns leave entitlement relationship with details
     *
     * @return BelongsToMany
     */
    public function leaveTaken()
    {
        return $this->belongsToMany(LeaveEntitlement::class, 'leave_taken')
            ->using(LeaveTaken::class)
            ->withPivot('days_taken')
            ->as('details');
    }

    /**
     * Set date approved
     * This may be moved to an observer class
     */
    public function setApprovedAtAttribute()
    {
        // TODO: add correct leave status id for (modified and approved)
        if ($this->leave_status_id == 1 || $this->leave_status_id == 2) {
            $this->approved_at = now();
        }
    }
}
