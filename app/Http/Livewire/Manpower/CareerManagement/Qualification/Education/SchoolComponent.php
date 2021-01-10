<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Qualification\Education;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use App\Models\System\Serviceperson\Qualifications\Education\School;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolDistrict;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolLevel;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolType;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolComponent extends Component
{
    use WithPagination, WithModal;


    public $search, $filterType, $filterDistrict, $filterLevel;
    public $institutions, $name, $slug, $schoolTypeId, $schoolDistrictId;
    public $description, $schoolTypes, $schoolDistricts, $schoolLevels;
    public $selectedId;
    public $updateMode = false;
    public $title = 'School';

    protected $listeners = ['school' => 'destroy'];

    public function mount()
    {
        $this->schoolLevels = SchoolLevel::all('id', 'name');
        $this->schoolTypes = SchoolType::all('id', 'name');
        $this->schoolDistricts = SchoolDistrict::all('id', 'name');
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        return view('livewire.manpower.career-management.qualification.education.school-component', [
            'data' => School::query()
                ->with('type', 'district')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filterType, function ($query) {
                    $query->where('school_type_id', '=', $this->filterType);
                })
                ->when($this->filterDistrict, function ($query) {
                    $query->where('school_district_id', '=', $this->filterDistrict);
                })
                ->when($this->filterLevel, function ($query) {
                    $query->where('school_level_id', '=', $this->filterLevel);
                })
                ->paginate(20)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->schoolTypeId = null;
        $this->schoolDistrictId = null;
        $this->description = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:course_institutions,name',
            'schoolTypeId' => 'required',
            'schoolDistrictId' => 'required',
            'description' => 'sometimes',
        ], [
            'name.required' => 'Please enter school name',
            'schoolTypeId.required' => 'Please select School type',
            'schoolDistrictId.required' => 'Please select School district',
        ]);

        $newSchool = School::create([
            'name' => $this->name,
            'school_type_id' => $this->schoolTypeId,
            'school_district_id' => $this->schoolDistrictId,
            'description' => $this->description,
        ]);

        $this->resetInput();

        session()->flash('message', 'School successfully added.');
    }

    public function edit($id)
    {
        $record = School::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->schoolTypeId = $record->school_type_id;
        $this->schoolDistrictId = $record->school_district_id;
        $this->description = $record->description;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'schoolTypeId' => 'required',
            'schoolDistrictId' => 'required',
            'description' => 'sometimes',
        ], [
            'name.required' => 'Please enter school name',
            'schoolTypeId.required' => 'Please select School type',
            'schoolDistrictId.required' => 'Please select School district',
        ]);


        if ($this->selectedId) {
            $record = School::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'school_type_id' => $this->schoolTypeId,
                'school_district_id' => $this->schoolDistrictId,
                'description' => $this->description,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = School::where('id', $id);
            $record->delete();
        }
    }
}
