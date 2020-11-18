<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlistment extends Model
{

    use HasFactory;

    protected $fillable = [
        'serviceperson_number',
        'enlistment_type_id',
        'engagement_period_id',
        'date',
    ];

    protected $dates = ['date'];

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function type()
    {
        return $this->belongsTo(EnlistmentType::class, 'enlistment_type_id');
    }

    public function engagementPeriod()
    {
        return $this->belongsTo(EngagementPeriod::class);
    }

    /**
     * Get End of Contract Date
     *
     */

    public function getContractEndAttribute()
    {
        return $this->date
            ->addYears($this->engagementPeriod->slug);
    }

}
