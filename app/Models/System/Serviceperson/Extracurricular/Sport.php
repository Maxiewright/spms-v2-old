<?php

namespace App\Models\System\Serviceperson\Extracurricular;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonSport;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['sport_type_id','name'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_sport')
            ->using(ServicepersonSport::class)
            ->as('details')
            ->withTimestamps()
            ->orderBy('pivot_created_at', 'DESC');
    }

    public function type()
    {
        return $this->belongsTo(SportType::class, 'sport_type_id');
    }
}
