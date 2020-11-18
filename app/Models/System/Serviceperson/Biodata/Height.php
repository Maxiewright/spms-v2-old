<?php

namespace App\Models\System\Serviceperson\Biodata;

use App\Models\Serviceperson\Measurement;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    protected $fillable = ['name'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_height')
            ->using(Measurement::class)
            ->as('details')
            ->withPivot('measured_on')
            ->withTimestamps();
    }
}
