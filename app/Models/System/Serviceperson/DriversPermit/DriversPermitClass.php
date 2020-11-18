<?php

namespace App\Models\System\Serviceperson\DriversPermit;

use App\Models\Serviceperson\DriversPermit;
use Illuminate\Database\Eloquent\Model;

class DriversPermitClass extends Model
{
    public $fillable = ['name','slug'];

    public function driversPermit(){
        return $this->hasOne(DriversPermit::class);
    }
}
