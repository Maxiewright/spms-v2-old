<?php

namespace App\Models\System\Serviceperson\CareerManagement\Job;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobTitleCategory extends Model
{
    use  SoftDeletes;

    protected $fillable = ['name', 'slug', 'description'];

    public function title()
    {
        return $this->hasMany(JobTitle::class);
    }
}
