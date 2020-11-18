<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = ['career_path_id', 'name', 'slug'];


    public function careerPath()
    {
        return $this->belongsTo(CareerPath::class);
    }
}
