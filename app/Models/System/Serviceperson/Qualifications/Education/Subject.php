<?php

namespace App\Models\System\Serviceperson\Qualifications\Education;

use App\Models\Serviceperson\ServicepersonEducation;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'education_level_id'];

    public function level(){
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function servicepersonEducation()
    {
       return $this->hasOne(ServicepersonEducation::class);
    }
}
