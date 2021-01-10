<?php

namespace Modules\Leave\Entities;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class LeaveEntitlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceperson_number' ,
        'leave_group_entitlement_id',
        'year',
        'days_due',
    ];

    /**
     * returns serviceperson model
     *
     * @return BelongsTo
     */

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    /**
     * returns leave group entitlement model
     *
     * @return BelongsTo
     */
    public function leaveGroupEntitlement()
    {
        return $this->belongsTo(LeaveGroupEntitlement::class);
    }

    /**
     * return pivot table with details
     *
     * @return BelongsToMany
     */
    public function leaveTaken()
    {
        return $this->belongsToMany(Leave::class, 'leave_taken')
            ->using(LeaveTaken::class)
            ->withPivot('days_taken')
            ->as('details');
    }

    /**
     * Leave comments
     *
     * @return MorphMany
     */
    public function remarks()
    {
        return $this->morphMany(LeaveRemark::class, 'remarkable');
    }


    public function leaveCarriedForward($year)
    {
        // calculate cumulative days take for a given year = $leaveTaken
        //  get all days taken for a give year form the "days_taken" pivot table
        //  sum those days to produce total days taken for the year
        // $this->days_due - $leaveTaken = leaveCarriedForward
    }

    public function setDaysDueAttribute()
    {
       $this->days_due = $this->daysDue();
    }

    public function daysDue () :int
    {
        $previous = LeaveEntitlement::where('id', '<', $this->id)
            ->where(function ($query){
                $query->where('serviceperson_number', $this->serviceperson_number);
                $query->where('leave_group_entitlement_id', $this->leave_group_entitlement_id);
            })
            ->orderBy('id', 'desc')
            ->first();

        if (isset($previous)) {
            return intval($previous->days_due + $this->leaveGroupEntitlement->days_entitled) ;

        } else {
            return  $this->leaveGroupEntitlement->days_entitled;
        }

    }


}
