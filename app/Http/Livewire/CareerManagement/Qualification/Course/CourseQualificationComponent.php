<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Course;

use App\Models\System\Serviceperson\Qualifications\Course\CourseQualification;
use Livewire\Component;
use Livewire\WithPagination;

class CourseQualificationComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Course Qualification';

    protected $listeners = ['course_institution' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.qualification.course.course-qualification-component',[
            'data' =>  CourseQualification::query()
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
            'name' => 'required|unique:course_qualifications,name',
            'slug' => 'required|unique:course_qualifications,slug'
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required'
        ]);

        CourseQualification::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = CourseQualification::findOrFail($id);
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
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = CourseQualification::find($this->selectedId);
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
            $record = CourseQualification::where('id', $id);
            $record->delete();
        }
    }
}
