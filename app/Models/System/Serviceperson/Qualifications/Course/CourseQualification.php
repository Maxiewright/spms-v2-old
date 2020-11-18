<?php

namespace App\Models\System\Serviceperson\Qualifications\Course;

use App\Models\Serviceperson\ServicepersonCourse;
use Illuminate\Database\Eloquent\Model;

class CourseQualification extends Model
{
    protected $fillable = ['qualification', 'description'];

    public function servicepersonCourse()
    {
        return $this->hasOne(ServicepersonCourse::class);
    }
}
