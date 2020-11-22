<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Education;

use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectComponent extends Component
{
    use WithPagination;


    public $search, $filterLevel;
    public $name, $educationLevelId;
    public $educationLevels;
    public $selectedId;
    public $updateMode = false;
    public $title = 'Subject';

    protected $listeners = ['subject' => 'destroy'];

    public function mount()
    {
        $this->educationLevels = EducationLevel::all('id', 'name');
        $this->educationLevelId = '';
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        return view('livewire.career-management.qualification.education.subject-component', [
            'data' => Subject::query()
                ->with('level')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filterLevel, function ($query) {
                    $query->where('education_level_id', '=', $this->filterLevel);
                })
                ->paginate(20)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->educationLevelId = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:subjects,name',
            'educationLevelId' => 'required',
        ], [
            'name.required' => 'Please enter subject name',
            'educationLevelId.required' => 'Please select education Leave',
        ]);

        Subject::create([
            'name' => $this->name,
            'education_level_id' => $this->educationLevelId,
        ]);

        $this->resetInput();

        session()->flash('message', 'Subject successfully added.');
    }

    public function edit($id)
    {
        $record = Subject::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->educationLevelId = $record->education_level_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'educationLevelId' => 'required',
        ], [
            'name.required' => 'Please enter subject name',
            'educationLevelId.required' => 'Please select education leave',

        ]);


        if ($this->selectedId) {
            $record = Subject::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'education_level_id' => $this->educationLevelId,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Subject::where('id', $id);
            $record->delete();
        }
    }


}
