<?php

namespace App\Models\System\Serviceperson\Qualifications\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
