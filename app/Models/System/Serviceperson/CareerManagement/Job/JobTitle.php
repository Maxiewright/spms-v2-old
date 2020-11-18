<?php

namespace App\Models\System\Serviceperson\CareerManagement\Job;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $fillable = ['job_title_category_id', 'name', 'slug', 'description'];

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function category(){
        return $this->belongsTo(JobTitleCategory::class, 'job_title_category_id');
    }
}
