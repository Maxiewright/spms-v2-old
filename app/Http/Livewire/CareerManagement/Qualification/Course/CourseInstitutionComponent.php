<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Course;

use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use Livewire\Component;

class CourseInstitutionComponent extends Component
{
    public $search, $filter;
    public $institutions, $name, $slug, $courseTypeId, $description, $courseTypes, $selectedId;
    public $updateMode = false;
    public $title = 'Course Institution';

    protected $listeners = ['course_institution' => 'destroy'];

    public function mount()
    {
        $this->courseTypes = CourseType::all();
    }


    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.qualification.course.course-institution-component',[
            'data' =>  CourseInstitution::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('course_type_id', '=',$this->filter);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->courseTypeId = null;
        $this->description = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:course_institutions,name',
            'slug' => 'required',
            'courseTypeId' => 'required',
            'description' => 'sometimes',
        ]);

        $newCourseInstitution = CourseInstitution::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'course_type_id' => $this->courseTypeId,
            'description' => $this->description,
        ]);

        $this->resetInput();

        session()->flash('message', 'Institution successfully updated.');
    }

    public function edit($id)
    {
        $record = CourseInstitution::findOrFail($id);

        $this->selectedId = $id;

        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->courseTypeId = $record->course_type_id;
        $this->description = $record->description;


        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'courseTypeId' => 'required',
            'description' => 'sometimes',
        ]);

        if ($this->selectedId) {
            $record = CourseInstitution::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'course_type_id' => $this->courseTypeId,
                'description' => $this->description,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = CourseInstitution::where('id', $id);
            $record->delete();
        }
    }
}
