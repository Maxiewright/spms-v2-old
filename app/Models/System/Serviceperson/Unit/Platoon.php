<?php

namespace App\Models\System\Serviceperson\Unit;

use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;

class Platoon extends Model
{
    public $fillable = ['name','slug','company_id'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function section(){
        return $this->hasMany(Section::class);
    }

    public function unit()
    {
        return $this->hasOne(Unit::class);
    }
}
