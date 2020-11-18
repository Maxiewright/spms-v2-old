<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class JobAppointment extends Model
{
    use HasFactory;

    protected $fillable = ['serviceperson_number', 'job_id', 'started_on', 'ended_on'];

    protected $dates = ['started_on', 'ended_on'];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($jobAppointment){
            if($jobAppointment->is($jobAppointment->serviceperson->currentJob))
            $jobAppointment->serviceperson->update([
                'job_id' => $jobAppointment->job_id,
                'career_path_id' => $jobAppointment->job->careerPath->id,
                'stream_id' => $jobAppointment->job->careerPath->stream->id,
                'branch_id' => $jobAppointment->job->careerPath->stream->branch->id,
            ]);
        });
    }

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class, 'serviceperson_number');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
