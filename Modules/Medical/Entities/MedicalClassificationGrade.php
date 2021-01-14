<?php

namespace Modules\Medical\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Medical\Database\Factories\MedicalClassificationGradeFactory;

class MedicalClassificationGrade extends Model
{
    use HasFactory;

    protected $fillable = ['degree', 'slug','description'];

    protected static function newFactory()
    {
        return MedicalClassificationGradeFactory::new();
    }


    public function medicalClassification()
    {
        $this->hasOne(MedicalClassification::class);
    }
}
