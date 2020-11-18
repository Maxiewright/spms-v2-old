<?php


namespace App\Traits\Serviceperson;


use App\Models\Serviceperson\ServicepersonCourse;
use App\Models\Serviceperson\ServicepersonEducation;

trait HasQualification
{
    /**
     * Qualification
     */
    public function servicepersonCourse()
    {
        return $this->hasMany(ServicepersonCourse::class);
    }

    public function resettlementCourse()
    {
        return $this->hasOne(ServicepersonCourse::class)
            ->where('is_resettlement', true)->latest();
    }

    public function scopeMilitaryCourse($query)
    {
        return $query->where('course_type_id', 2 )
            ->orWhere('course_type_id', 2 )
            ->orWhere('course_type_id', 3 );
    }

    public function scopeCivilianCourse($query)
    {
        return $query->where('course_type_id', 1 )
            ->orWhere('course_type_id', 5);
    }

    public function civilianCourses()
    {
        return $this->hasMany(ServicepersonCourse::class);
    }


    public function servicepersonEducation()
    {
        return $this->hasMany(ServicepersonEducation::class);
    }

}
