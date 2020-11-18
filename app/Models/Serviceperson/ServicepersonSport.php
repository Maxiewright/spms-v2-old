<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Extracurricular\Sport;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ServicepersonSport extends Pivot
{


    protected $table = ['serviceperson_sport'];

    protected $fillable = ['sport_id', 'serviceperson_number'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
