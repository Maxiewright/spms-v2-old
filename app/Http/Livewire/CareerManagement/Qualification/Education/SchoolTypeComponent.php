<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Education;

use App\Models\System\Serviceperson\Qualifications\Education\SchoolType;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolTypeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'School Type';

    protected $listeners = ['school_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.qualification.education.school-type-component',[
            'data' =>  SchoolType::query()
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
            'name' => 'required|unique:school_types,name',
        ],[
            'name.required' => 'This field is required'
        ]);
        SchoolType::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = SchoolType::findOrFail($id);
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
            $record = SchoolType::find($this->selectedId);
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
            $record = SchoolType::where('id', $id);
            $record->delete();
        }
    }
}
