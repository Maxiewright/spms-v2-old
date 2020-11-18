<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Biodata\Weight;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Weigh extends Pivot
{

    protected $fillable = ['weight_id', 'serviceperson_number', 'weighed_on'];

    protected $table = ['serviceperson_weight'];

    protected $dates = ['weighed_on'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class);
    }
}
