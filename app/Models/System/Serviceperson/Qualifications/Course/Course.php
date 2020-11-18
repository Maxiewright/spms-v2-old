<?php

namespace App\Models\System\Serviceperson\Qualifications\Course;

use App\Models\Serviceperson\ServicepersonCourse;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'slug','description'];

    public function institution(){
        return $this->belongsToMany(CourseInstitution::class, 'course_course_institution', 'course_id', 'course_institution_id')
            ->withTimestamps();
    }

    public function servicepersonCourse()
    {
        return $this->hasOne(ServicepersonCourse::class);
    }
}
