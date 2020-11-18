<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\ServiceData\ReEngagementPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReEngagement extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'serviceperson_number', 're_engagement_period_id', 'requested_on', 'medical_classification_id',
        'recommendation_status_id','recommended_by', 'recommended_on', 'recommendation_particulars','approval_status_id', 'approved_by', 'approved_on', 'approval_particulars'
    ];

    protected $dates = [
        'requested_on', 'recommended_on', 'approved_on'
    ];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function recommender()
    {
        return $this->belongsTo(Serviceperson::class, 'recommended_by');
    }

    public function approver()
    {
        return $this->belongsTo(Serviceperson::class, 'approved_by');
    }

    public function period()
    {
        return $this->belongsTo(ReEngagementPeriod::class, 're_engagement_period_id');
    }

    public function medicalClassification()
    {
        return $this->belongsTo(MedicalClassification::class);
    }

    /**
     * Get End of Contract Date
     *
    */

    public function getContractEndAttribute()
    {
        return $this->approved_on
            ->addYears($this->period->slug)
            ->format('d M Y');
    }



}
