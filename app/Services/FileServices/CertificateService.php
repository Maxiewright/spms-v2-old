<?php


namespace App\Services\FileServices;

use App\Models\System\Serviceperson\Qualifications\Course\Course;
use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CertificateService
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function storeEducationCertificate($model)
    {
        if ($this->request->hasFile('education_certificate')){

            $serviceNumber = $this->request->serviceperson_number;
            $subject = Subject::find($this->request->subject_id)->name;
            $endDate = Str::limit($this->request->completed_on, 4, '');

            $ext = $this->request->file('education_certificate')->extension();
            $fileName = $serviceNumber.$subject.$endDate.'.'.$ext;

            Image::make($this->request->file('education_certificate'))
                ->resize(1000,400)
                ->save(public_path('/storage/certificates/'. $fileName));

            $model->certificate()->create(['path' => $fileName]);
        }
    }

    public function storeCourseCertificate($model)
    {
        if ($this->request->hasFile('course_certificate')){
            $serviceNumber = $this->request->serviceperson_number;
            $course = strtolower(str_replace(' ', '_',Course::find($this->request->course_id)->name ));
            $endDate = Str::limit($this->request->ended_on, 4, '');

            $ext = $this->request->file('course_certificate')->extension();
            $fileName = $serviceNumber.$course.$endDate.'.'.$ext;

            Image::make($this->request->file('course_certificate'))
                ->resize(1000,400)
                ->save(public_path('/storage/certificates/'. $fileName));

            $model->certificate()->create(['path' => $fileName]);
        }
    }


}
