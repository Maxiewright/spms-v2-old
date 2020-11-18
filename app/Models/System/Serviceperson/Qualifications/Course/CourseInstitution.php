<?php

namespace App\Models\System\Serviceperson\Qualifications\Course;

use App\Models\Serviceperson\ServicepersonCourse;
use Illuminate\Database\Eloquent\Model;

class CourseInstitution extends Model
{
   protected $fillable = [ 'name', 'slug','course_type_id', 'description'];

   public function course(){
        return $this->belongsToMany(Course::class, 'course_course_institution', 'course_institution_id','course_id')
            ->withTimestamps();
    }

    public function type(){
       return $this->belongsTo(CourseType::class, 'course_type_id');
    }

    public function servicepersonCourse()
    {
        return $this->hasOne(ServicepersonCourse::class);
    }
}
