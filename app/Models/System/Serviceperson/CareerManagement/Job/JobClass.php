<?php

namespace App\Models\System\Serviceperson\CareerManagement\Job;

use Illuminate\Database\Eloquent\Model;

class JobClass extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}


