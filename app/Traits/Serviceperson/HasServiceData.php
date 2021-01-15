<?php


namespace App\Traits\Serviceperson;


use App\Models\Serviceperson\Award;
use App\Models\Serviceperson\Deployment;
use App\Models\Serviceperson\Enlistment;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Promotion;
use App\Models\Serviceperson\ReEngagement;
use App\Models\Serviceperson\Unit;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use App\Models\System\Serviceperson\ServiceData\Decoration;
use App\Models\System\Serviceperson\ServiceData\Rank;
use App\Models\System\Serviceperson\Unit\Formation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasServiceData
{

    /** **************************************** Rank & Promotions ****************************************************/

    /**
     * Enlisted Scope
     * @param $query
     * @return mixed
     */
    public function scopeEnlisted($query)
    {
        return $query->where('rank_id', '<=', 8);
    }

    /**
     * Officer Scope
     * @param $query
     * @return mixed
     */
    public function scopeOfficer($query)
    {
        return $query->where('rank_id', '>=', 9);
    }

    /**
     * return serviceperson formation
     */
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    /**
     * return serviceperson rank
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    /**
     * Return rank abbreviation based on formation
     * @return mixed
     */
    public function getCurrentRankSlugAttribute()
    {
        if ($this->formation->name == 'Regiment') {
            return $this->rank->regiment_slug;
        } elseif ($this->formation->name == 'Coast Guard') {
            return $this->rank->coast_guard_slug;
        } elseif ($this->formation->name == 'Air Guard') {
            return $this->rank->air_guard_slug;
        }
    }

    /**
     * Return rank full name based on formation
     * @return mixed
     */
    public function getCurrentRankAttribute()
    {
        if ($this->formation->name == 'Regiment') {
            return $this->rank->regiment;
        } elseif ($this->formation->name == 'Coast Guard') {
            return $this->rank->coast_guard;
        } elseif ($this->formation->name == 'Air Guard') {
            return $this->rank->air_guard;
        }
    }

    /**
     * Return all Serviceperson's Promotions (Ranks)
     */
    public function promotions()
    {
        return $this->belongsToMany(Rank::class, 'promotions')
            ->using(Promotion::class)
            ->withPivot('promoted_on', 'substantive_on')
            ->as('details')
            ->orderBy('pivot_promoted_on', 'DESC')
            ->withTimestamps();
    }

    /**
     * Return serviceperson last promotion
     */
    public function lastPromotion()
    {
        return $this->hasOne(Promotion::class)->latest('promoted_on');
    }

    /** **************************************** Job Appointments ****************************************************/

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function careerPath()
    {
        return $this->belongsTo(CareerPath::class);
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Returns Serviceperson current job.
     * @return HasOne
     */
    public function getCurrentJobSlugAttribute()
    {
        return $this->job->title->slug;
    }

//    /**
//     * Returns Serviceperson current job.
//     * @return HasOne
//     */
//    public function getCurrentJobAttribute()
//    {
//        return $this->job->title->name;
//    }

    /**
     * Returns all serviceperson Job Appointments
     * @return HasMany
     */
    public function JobAppointments()
    {
        return $this->hasMany(JobAppointment::class)
            ->orderBy('started_on', 'DESC');
    }

    /**
     * Return serviceperson current Unit
     */
    public function currentJob()
    {
        return $this->hasOne(JobAppointment::class)->latest('started_on');
    }

    /** **************************************** Job Appointments ****************************************************/


    /**
     * Return serviceperson Current unit
     * @return HasOne
     */

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Return all serviceperson unit data.
     * @return HasMany
     */

    public function units()
    {
        return $this->hasMany(Unit::class)
            ->orderBy('joined_on', 'DESC');
    }

    /**
     * Return serviceperson current Unit
     */
    public function currentUnit()
    {
        return $this->hasOne(Unit::class)->latest('joined_on');
    }

    /**
     * Retrive serviceperson company short name
     * @return mixed
     */
    public function getCoyAttribute()
    {
        return $this->unit->company->slug;
    }

    /**
     * Serviceperson Current Unit company
     * Battalion and Platoon can be accessed through the company
     */

    public function getBattalionSlugAttribute()
    {
        return $this->unit
            ? $this->unit->company->battalion->slug
            : 'No unit data found!';
    }


    /** ******************************************* Enlistment and Re-engagement ************************************************************/

    /**
     * Return serviceperson enlistment data
     * @return HasOne
     */
    public function enlistments()
    {
        return $this->hasMany(Enlistment::class);
    }

    /**
     * Return serviceperson enlistment data
     * @return HasOne
     */
    public function lastEnlistment()
    {
        return $this->hasOne(Enlistment::class)->latest('date');
    }

    /**
     *   Return serviceperson Re-engagement data
     */
    public function reEngagements()
    {
        return $this->hasMany(ReEngagement::class);
    }


    /** ********************************* Decorations / Awards / Commendations ****************************************/

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany(Decoration::class, 'serviceperson_decoration')
            ->using(Award::class)
            ->withPivot('received_on')
            ->as('details')
            ->orderBy('pivot_received_on', 'DESC')
            ->withTimestamps();
    }

//    Deployments

    public function deployments(): HasMany
    {
        return $this->hasMany(Deployment::class);
    }
}
