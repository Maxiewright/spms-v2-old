<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CareerPathEstablishment extends Pivot
{
    public function careerPath()
    {
        return $this->belongsTo(CareerPath::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
