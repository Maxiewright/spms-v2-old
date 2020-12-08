<?php

namespace App\Http\Livewire\Serviceperson\Create\Qualification;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use App\Models\System\Serviceperson\Qualifications\Course\CourseQualification;
use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use Livewire\Component;

class Course extends Component
{
    use WithSteps;

    public $types;
    public $institutions = [];
    public $courses = [];
    public $qualifications;

    public function mount()
    {
        $this->types = CourseType::all('id', 'name');
        $this->qualifications = CourseQualification::all('id', 'name');
    }


    public function render()
    {
        if (isset($this->data['course']['type'])){
            $this->institutions = CourseInstitution::where('course_type_id', $this->data['course']['type'] )->get();
        }

        if (isset($this->data['course']['institution'])){
            $this->courses = CourseInstitution::findOrFail($this->data['course']['institution'])
                ->course()->get();
        }

        return view('livewire.serviceperson.create.qualification.course');
    }
}
