<?php

namespace App\Models\Serviceperson;

use App\Models\Authentication\User;
use App\Models\System\Serviceperson\Qualifications\Course\Course;
use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use App\Models\System\Serviceperson\Qualifications\Course\CourseQualification;
use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use App\Models\System\Universal\Polymorphic\Certificate;
use App\Traits\MustBeApproved;
use Approval\Traits\RequiresApproval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;



class ServicepersonCourse extends Model
{
    use   HasFactory, SoftDeletes, MustBeApproved;

    protected $fillable = [
        'serviceperson_number', 'course_type_id', 'course_institution_id', 'course_id',
        'course_qualification_id', 'place_on_course', 'started_on', 'ended_on', 'is_resettlement', 'is_in-service',
    ];

    protected  $dates = ['started_on','ended_on'];

    protected $casts = [
        'is_resettlement' => 'boolean',
        'is_in-service' => 'boolean'
    ];

    public function getModificationDetailsAttribute()
    {
        try {
            return $this->modificationDetails([
                'institution' => $this->modificationAttribute('course_institution_id', 'courseInstitution'),
                'course' => $this->modificationAttribute('course_id', 'course'),
                'qualification' => $this->modificationAttribute('course_qualification_id', 'courseQualification'),
                'place' => $this->modificationAttribute('place_on_course'),
                'started' => $this->modificationAttribute('started_on', null, 'date'),
                'ended' => $this->modificationAttribute('ended_on',null, 'date'),
            ]);
        } catch (\Exception $e) {
        }
    }



    /**
     * Function that defines the rule of when an approval process
     * should be actioned for this model.
     *
     * @param array $modifications
     *
     * @return boolean
     */
    protected function requiresApprovalWhen(array $modifications) : bool
    {
        if ($this->isDirty()){
            return true;
        }
        return false;
    }

    /**
     * Retrieve url for course certificate
     *
     * @return string
     */

    public function getCertificateImageAttribute()
    {
        return Storage::url('certificates/'.$this->certificate->path);
    }

    public function getStartDateAttribute()
    {
        return $this->started_on->format('d M Y');
    }
    public function getEndDateAttribute()
    {
       return $this->ended_on->format('d M Y');
    }

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function type()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id');
    }
    public function institution()
    {
        return $this->belongsTo(CourseInstitution::class, 'course_institution_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function qualification()
    {
        return $this->belongsTo(CourseQualification::class, 'course_qualification_id');
    }

    public function certificate()
    {
        return $this->morphOne(Certificate::class, 'certifiable');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
