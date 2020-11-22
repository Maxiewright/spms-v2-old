<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Education;

use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use Livewire\Component;
use Livewire\WithPagination;

class EducationLevelComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Education Level';

    protected $listeners = ['education_level' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.qualification.education.education-level-component',[
            'data' =>  EducationLevel::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->where('slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:education_levels,name',
            'slug' => 'required|unique:education_levels,slug'
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required'
        ]);

        EducationLevel::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = EducationLevel::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required'
        ]);

        if ($this->selectedId) {
            $record = EducationLevel::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = EducationLevel::where('id', $id);
            $record->delete();
        }
    }
}
