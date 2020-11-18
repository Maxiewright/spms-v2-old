<?php

namespace App\Models\System\Serviceperson\Qualifications\Education;

use Illuminate\Database\Eloquent\Model;

class SchoolType extends Model
{
    protected $fillable = ['name'];

    public function school()
    {
        return $this->hasMany(School::class);
    }
}
