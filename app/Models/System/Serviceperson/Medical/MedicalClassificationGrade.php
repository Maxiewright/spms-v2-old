<?php

namespace App\Models\System\Serviceperson\Medical;

use App\Models\Serviceperson\MedicalClassification;
use Illuminate\Database\Eloquent\Model;

class MedicalClassificationGrade extends Model
{
    protected $fillable = ['degree', 'slug','description'];

    public function medicalClassification()
    {
        $this->hasOne(MedicalClassification::class);
    }
}
