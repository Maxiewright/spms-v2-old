<?php

namespace App\Models\Serviceperson;


use App\Models\User;
use App\Models\System\Serviceperson\Qualifications\Education\EducationGrade;
use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use App\Models\System\Serviceperson\Qualifications\Education\School;
use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use App\Models\System\Universal\Polymorphic\Certificate;
use App\Traits\MustBeApproved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;



class ServicepersonEducation extends Model
{
    use  HasFactory, SoftDeletes, MustBeApproved;

    protected $fillable = [
        'serviceperson_number',
        'education_level_id',
        'subject_id',
        'education_grade_id',
        'school_id',
        'completed_on'
    ];

    public function getModificationDetailsAttribute()
    {
        try {
            return $this->modificationDetails([
                'education' => $this->modificationAttribute('education_level_id', 'educationLevel'),
                'subject' => $this->modificationAttribute('subject_id', 'subject'),
                'grade' => $this->modificationAttribute('education_grade_id', 'grade'),
                'school' => $this->modificationAttribute('school_id', 'school'),
                'completed' => $this->modificationAttribute('completed_on', null, 'date'),
            ]);
        } catch (\Exception $e) {
        }
    }

    protected  $dates = ['completed_on'];

    public function getCertificateImageAttribute()
    {
        return Storage::url('certificates/'.$this->certificate->path);
    }

    public function getEndDateAttribute()
    {
        return $this->completed_on->format('d M Y');
    }

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(EducationGrade::class, 'education_grade_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
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
