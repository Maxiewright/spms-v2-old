<?php

namespace App\Http\Livewire\Serviceperson\Create\Qualification;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Qualifications\Education\EducationGrade;
use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use App\Models\System\Serviceperson\Qualifications\Education\School;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolDistrict;
use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use Livewire\Component;

class Education extends Component
{
    use WithSteps;

    public $levels;
    public $subjects = [];
    public $grades = [];
    public $districts;
    public $schools = [];

    public function mount()
    {
        $this->levels = EducationLevel::all('id', 'name');
        $this->districts = SchoolDistrict::all('id', 'name');
    }

    public function render()
    {
        if (isset($this->data['education']['level'])){
            $this->subjects = Subject::where('education_level_id', $this->data['education']['level'])->get();
            $this->grades = EducationGrade::where('education_level_id', $this->data['education']['level'] )->get();
        }

        if (isset($this->data['education']['district'])){
            $this->schools = School::where('school_district_id', $this->data['education']['district'])->get();
        }

        return view('livewire.serviceperson.create.qualification.education');
    }
}
