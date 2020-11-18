<?php

namespace App\Models\System\Serviceperson\Address;

use Illuminate\Database\Eloquent\Model;

class DivisionOrRegionType extends Model
{
    protected $fillable = ['name'];

    public function divisionOrRegion(){
        return $this->hasMany(DivisionOrRegion::class);
    }
}
