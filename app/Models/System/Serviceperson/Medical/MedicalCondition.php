<?php

namespace App\Models\System\Serviceperson\Medical;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonMedicalCondition;
use Illuminate\Database\Eloquent\Model;

class MedicalCondition extends Model
{
   protected $fillable = ['name'];

   public  function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_medical_conditions')
            ->using(ServicepersonMedicalCondition::class)
            ->withPivot('particulars')
            ->as('details')
            ->orderBy('pivot_created_at', 'DESC')
            ->withTimestamps();
   }
}
