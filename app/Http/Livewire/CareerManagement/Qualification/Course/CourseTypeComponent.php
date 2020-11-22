<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Course;

use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use Livewire\Component;
use Livewire\WithPagination;

class CourseTypeComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Course Type';

    protected $listeners = ['course_type' => 'destroy'];

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.qualification.course.course-type-component',[
            'data' =>  CourseType::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
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
            'name' => 'required||unique:course_types,name',
            'slug' => 'required|unique:course_types,slug'
        ]);
        CourseType::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = CourseType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:course_types,name',
            'slug' => 'required|unique:course_types,slug'
        ]);
        if ($this->selectedId) {
            $record = CourseType::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = CourseType::where('id', $id);
            $record->delete();
        }
    }
}
