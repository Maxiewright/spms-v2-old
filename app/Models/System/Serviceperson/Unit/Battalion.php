<?php

namespace App\Models\System\Serviceperson\Unit;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;

class Battalion extends Model
{
    protected $fillable = ['battalion','slug'];

    public function company(){
        return $this->hasMany(Company::class);
    }

    public function unit(){
        return $this->hasOne(Unit::class);
    }

}
