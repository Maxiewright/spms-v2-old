<?php

namespace App\Models\System\Universal\Lookup;

use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\EmergencyContact;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = ['name'];

    public function dependents(){
        return $this->hasOne(Dependent::class);
    }

    public function emergencyContact(){
        return $this->hasOne(EmergencyContact::class);
    }
}
