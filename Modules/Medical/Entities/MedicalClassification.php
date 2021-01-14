<?php

namespace Modules\Medical\Entities;

use App\Models\Serviceperson\Serviceperson;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceperson_number','physical_capacity','upper_limbs',
        'locomotion','hearing_left','hearing_right',
        'eyesight_left','eyesight_right','mental_capacity','stability',
        'performed_on','performed_at','medical_officer', 'medical_officer_remarks'
    ];

    protected static function newFactory()
    {
        return \Modules\Medical\Database\factories\MedicalClassificationFactory::new();
    }

//    public $dates =  ['performed_on'];

    public function getDatePerformedAttribute()
    {
        return (new Carbon($this->performed_on))->format('d M Y');

    }

    public function getClassificationAttribute()
    {
        $medicalOfficer = $this->medicalOfficer->name;
        $date = (new Carbon($this->performed_on))->format('d M Y');
        return $medicalOfficer . ' - ' . $date;

    }

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function medicalOfficer()
    {
        return $this->belongsTo(Serviceperson::class,  'medical_officer');
    }

    /**
     *
     * These return the medical classification grades
     *
     * @return string
     *
     */
    public function physicalCapacity()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'physical_capacity');
    }
    public function upperLimbs()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'upper_limbs');
    }
    public function locomotion()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'locomotion');
    }
    public function hearingLeft()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'hearing_left');
    }
    public function hearingRight()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'hearing_right');
    }
    public function eyesightLeft()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'eyesight_left');
    }
    public function mentalCapacity()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'mental_capacity');
    }
    public function stability()
    {
        return $this->belongsTo(MedicalClassificationGrade::class, 'stability');
    }
}
