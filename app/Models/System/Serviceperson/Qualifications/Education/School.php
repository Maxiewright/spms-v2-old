<?php

namespace App\Models\System\Serviceperson\Qualifications\Education;

use App\Models\Serviceperson\ServicepersonEducation;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'school_type_id',
        'school_district_id',
        'name',
        'description'
    ];

    public function type()
    {
        return $this->belongsTo(SchoolType::class, 'school_type_id');
    }

    public function district(){
        return $this->belongsTo(SchoolDistrict::class, 'school_district_id');
    }

    public function servicepersonEducation()
    {
        return $this->hasMany(ServicepersonEducation::class);
    }
}
