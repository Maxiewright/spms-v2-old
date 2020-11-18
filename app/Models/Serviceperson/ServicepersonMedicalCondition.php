<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Medical\MedicalCondition;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ServicepersonMedicalCondition extends Pivot
{

    protected $table = ['serviceperson_medical_conditions'];

    protected $fillable = ['medical_condition_id', 'serviceperson_number', 'particulars'];

    protected $dates = ['created_at', 'updated_at'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function medicalCondition()
    {
        return $this->belongsTo(MedicalCondition::class);
    }
}
