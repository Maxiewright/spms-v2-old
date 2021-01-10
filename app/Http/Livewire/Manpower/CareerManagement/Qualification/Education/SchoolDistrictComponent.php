<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Qualification\Education;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolDistrict;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolDistrictComponent extends Component
{
    use WithPagination, WithModal;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'School District';

    protected $listeners = ['school_district' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.qualification.education.school-district-component',[
            'data' =>  SchoolDistrict::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:school_districts,name',
        ],[
            'name.required' => 'This field is required'
        ]);
        SchoolDistrict::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = SchoolDistrict::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
        ],[
            'name.required' => 'This field is required'
        ]);
        if ($this->selectedId) {
            $record = SchoolDistrict::find($this->selectedId);
            $record->update([
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = SchoolDistrict::where('id', $id);
            $record->delete();
        }
    }
}
