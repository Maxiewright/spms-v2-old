<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StreamEstablishment extends Pivot
{

    public function stream()
    {
       return $this->belongsTo(Stream::class);
    }

    public function rank()
    {
       return $this->belongsTo(Rank::class);
    }
}
