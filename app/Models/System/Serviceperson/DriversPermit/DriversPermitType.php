<?php

namespace App\Models\System\Serviceperson\DriversPermit;

use App\Models\Serviceperson\DriversPermit;
use Illuminate\Database\Eloquent\Model;

class DriversPermitType extends Model
{
    public $fillable = ['name'];

    public function driversPermit()
    {
        return $this->hasOne(DriversPermit::class);
    }
}
