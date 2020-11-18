<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BranchEstablishment extends Pivot
{

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function rank()
    {
       return $this->belongsTo(Rank::class);
    }
}
