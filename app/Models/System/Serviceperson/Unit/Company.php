<?php

namespace App\Models\System\Serviceperson\Unit;

use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','slug', 'battalion_id'];

    public function battalion(){
        return $this->belongsTo(Battalion::class);
    }

    public function platoon(){
        return $this->hasMany(Platoon::class);
    }

    public function unit()
    {
        return $this->hasOne(Unit::class);
    }

}
