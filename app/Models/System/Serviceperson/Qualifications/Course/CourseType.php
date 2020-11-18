<?php

namespace App\Models\System\Serviceperson\Qualifications\Course;

use App\Models\Serviceperson\ServicepersonCourse;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $fillable = ['name', 'slug'];

    public function courseInstitution(){
        return $this->hasMany(CourseInstitution::class);
    }

    public function servicepersonCourse(){
        return $this->hasOne(ServicepersonCourse::class);
    }
}
