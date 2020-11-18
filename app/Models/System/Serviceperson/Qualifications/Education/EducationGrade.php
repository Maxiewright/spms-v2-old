<?php

namespace App\Models\System\Serviceperson\Qualifications\Education;

use App\ApplicationModels\Serviceperson\ServicepersonEducation;
use Illuminate\Database\Eloquent\Model;

class EducationGrade extends Model
{
    protected $fillable = [
        'education_level_id',
        'grade',
        'description',
        'us_grade_equivalent',
        'us_description',
    ];

    public function level(){
        return $this->hasMany(EducationLevel::class, 'education_level_id');
    }

    public function servicepersonEducation()
    {
        return $this->hasOne(ServicepersonEducation::class);
    }
}
