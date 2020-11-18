<?php

namespace App\Models\System\Serviceperson\Address;

use Illuminate\Database\Eloquent\Model;

class DivisionOrRegion extends Model
{
    protected $fillable = ['division_or_region_type_id', 'name' ,'code'];

    public function cityOrTown(){
        return $this->hasMany(CityOrTown::class);
    }

    public function type(){
        return $this->belongsTo(DivisionOrRegionType::class, 'division_or_region_type_id');
    }

}
