<?php


namespace App\Traits\Serviceperson;

use App\Models\Serviceperson\Biodata;
use App\Models\Serviceperson\Measurement;
use App\Models\Serviceperson\MedicalClassification;
use App\Models\Serviceperson\ServicepersonAllergy;
use App\Models\Serviceperson\ServicepersonMedicalCondition;
use App\Models\Serviceperson\ServicepersonVaccine;
use App\Models\Serviceperson\Weigh;
use App\Models\System\Serviceperson\Biodata\Height;
use App\Models\System\Serviceperson\Biodata\Weight;
use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\MedicalCondition;
use App\Models\System\Serviceperson\Medical\Vaccine;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasMedicalData
{
    /**
     * Medical
     */

    public function allergies()
    {
        return $this->belongsToMany(Allergy::class, 'serviceperson_allergies')
            ->using(ServicepersonAllergy::class)
            ->withPivot('particulars')
            ->as('details')
            ->orderBy('pivot_created_at', 'DESC')
            ->withTimestamps();
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    /**
     * Return Serviceperson current height
     * @return HasOne
     */
    public function getHeightAttribute()
    {
        return $this->measurements()->latest('measured_on')->first();
    }

    public function measurements()
    {
        return $this->belongsToMany(Height::class, 'serviceperson_height')
            ->using(Measurement::class)
            ->as('details')
            ->withPivot('measured_on')
            ->withTimestamps();
    }


    public function medicalClassifications()
    {
        return $this->hasMany(MedicalClassification::class);
    }

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class, 'serviceperson_vaccines')
            ->using(ServicepersonVaccine::class)
            ->withPivot('received_on', 'place_administered')
            ->as('details')
            ->orderBy('pivot_received_on', 'DESC')
            ->withTimestamps();
    }

    public function medicalConditions()
    {
        return $this->belongsToMany(MedicalCondition::class, 'serviceperson_medical_conditions')
            ->using(ServicepersonMedicalCondition::class)
            ->withPivot('particulars')
            ->as('details')
            ->orderBy('pivot_created_at', 'DESC')
            ->withTimestamps();
    }

    /**
     * return the serviceperson current weight
     *
     * @return mixed|null
     */

    public function getWeightAttribute()
    {
        return $this->weights()->latest('weighed_on')->first();
    }

    /**
     * Serviceperson weights
     *
     * @return BelongsToMany
     */

    public function weights()
    {
        return $this->belongsToMany(Weight::class, 'serviceperson_weight')
            ->using(Weigh::class)
            ->as('details')
            ->withPivot('weighed_on')
            ->withTimestamps();
    }
}
