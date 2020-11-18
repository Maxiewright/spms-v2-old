<?php

namespace App\Models\System\Serviceperson\Qualifications\Education;

use App\Models\Serviceperson\ServicepersonEducation;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $fillable = ['name','slug','description'];

    public function subject(){
        return $this->hasMany(Subject::class);
    }

    public function grade(){
        return $this->belongsTo(EducationGrade::class,'education_garde_id');
    }

    public function servicepersonEducation(){
        return $this->hasOne(ServicepersonEducation::class);
    }
}
