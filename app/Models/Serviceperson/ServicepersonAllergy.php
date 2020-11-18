<?php

namespace App\Models\Serviceperson;


use App\Models\System\Serviceperson\Medical\Allergy;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ServicepersonAllergy extends Pivot
{

    protected $table = ['serviceperson_medical_conditions'];

    protected $fillable = ['medical_condition_id', 'serviceperson_number', 'particulars'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function allergy()
    {
        return $this->belongsTo(Allergy::class);
    }
}
