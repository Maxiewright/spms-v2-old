<?php

namespace App\Models\System\Serviceperson\Medical;


use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonVaccine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vaccine extends Model
{
    Use  SoftDeletes;

    protected $fillable = ['name'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_vaccines')
            ->using(ServicepersonVaccine::class)
            ->withPivot('received_on','place_administered')
            ->as('details')
            ->orderBy('pivot_received_on', 'DESC')
            ->withTimestamps();

    }

}
