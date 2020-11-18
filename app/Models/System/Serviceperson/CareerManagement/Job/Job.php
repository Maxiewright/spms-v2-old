<?php

namespace App\Models\System\Serviceperson\CareerManagement\Job;


use App\Models\Serviceperson\JobAppointment;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'job_title_id','job_class_id', 'rank_id' ,'career_path_id', 'establishment', 'description'
    ];

    protected static $logAttributes = ['job_title_id','job_class_id', 'rank_id' ,'career_path_id', 'establishment', 'description'];

    public function JobAppointments()
    {
        return $this->hasMany(JobAppointment::class);
    }

    /**
     * Serviceperson relationship
     */
    public function title()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }
    /**
     * The Class of the particular job
     */
    public function class()
    {
        return $this->belongsTo(JobClass::class, 'job_class_id');
    }
    /**
     * Substantive Rank of Job
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
    /**
     * Career Path to which the job belongs
     */
    public function careerPath()
    {
        return $this->belongsTo(CareerPath::class);
    }


}
