<?php

namespace App\Models\System\Serviceperson\Unit;

use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $fillable = ['section','slug'];

    public function platoon(){
        return $this->belongsTo(Platoon::class);
    }

    public function unit()
    {
        return $this->hasMany(Unit::class, 'section_id');
    }
}
