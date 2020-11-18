<?php

namespace App\Models\System\Serviceperson\Biodata;


use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Weigh;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = ['name'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_weight')
            ->using(Weigh::class)
            ->as('details')
            ->withPivot('weighed_on')
            ->withTimestamps();
    }
}
