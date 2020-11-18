<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Biodata\Height;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Measurement extends Pivot
{

    protected $fillable = ['height_id', 'serviceperson_number', 'measured_on'];

    protected $table = ['serviceperson_height'];

    protected $dates = ['measured_on', 'created_at', 'updated_at'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function height()
    {
        return $this->belongsTo(Height::class);
    }
}
