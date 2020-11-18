<?php


namespace App\Traits\Serviceperson;


use App\Models\Serviceperson\DriversPermit;
use App\Models\Serviceperson\MilitaryIdCard;
use App\Models\Serviceperson\NationalIdCard;
use App\Models\Serviceperson\Passport;

trait HasIdentification
{



    public function militaryIdCard()
    {
        return $this->hasOne(MilitaryIdCard::class);
    }

    public function nationalIdCard()
    {
        return $this->hasOne(NationalIdCard::class);
    }

    public function passport()
    {
        return $this->hasOne(Passport::class);
    }

    public function driversPermits()
    {
        return $this->hasMany(DriversPermit::class);
    }
}
