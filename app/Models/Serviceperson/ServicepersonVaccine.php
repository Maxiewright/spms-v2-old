<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Medical\Vaccine;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ServicepersonVaccine extends Pivot
{

    protected $table = ['serviceperson_vaccines'];

    protected $fillable = ['vaccine_id', 'serviceperson_number', 'received_on', 'place_administered'];

    protected $dates = ['received_on'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
}
