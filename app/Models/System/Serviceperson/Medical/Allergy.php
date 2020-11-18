<?php

namespace App\Models\System\Serviceperson\Medical;


use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonAllergy;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $fillable = ['name', 'allergy_type_id'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_allergies')
            ->using(ServicepersonAllergy::class)
            ->withPivot('particulars')
            ->as('details')
            ->orderBy('pivot_created_at', 'DESC')
            ->withTimestamps();
    }

    public function type()
    {
        return $this->belongsTo(AllergyType::class, 'allergy_type_id');
    }
}
