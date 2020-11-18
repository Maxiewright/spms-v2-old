<?php

namespace App\Models\System\Serviceperson\Address;

use App\Models\Serviceperson\Address;
use App\Models\Serviceperson\NationalIdCard;
use Illuminate\Database\Eloquent\Model;

class CityOrTown extends Model
{

   protected $fillable = ['name','division_or_region_id'];

    public function address(){
        return $this->hasMany(Address::class);
    }

    public function divisionOrRegion(){
        return $this->belongsTo(DivisionOrRegion::class);
    }

    public function nationalIdCard()
    {
        return $this->hasOne(NationalIdCard::class, 'place_of_birth');
    }
}
