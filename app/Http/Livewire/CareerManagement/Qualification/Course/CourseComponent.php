<?php

namespace App\Http\Livewire\CareerManagement\Qualification\Course;

use App\Models\System\Serviceperson\Qualifications\Course\Course;
use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CourseComponent extends Component
{
    use WithPagination;



    public $search = '';
    public $filter = '';
    public $name, $slug, $institutionId, $description ,$selectedId, $institutions;
    public $updateMode = false;
    public $title = 'Course';

    protected $listeners = ['course' => 'destroy', 'detach'];

    public function mount()
    {
        $this->institutions = CourseInstitution::all('id', 'name', 'slug');
    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.qualification.course.course-component',[
            'data' =>  Course::query()
                ->with('institution')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->whereHas('institution', function($query){
                        $query->where('course_institution_id', '=', $this->filter);
                    });
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->description = null;
        $this->institutionId = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:course_qualifications,name',
            'slug' => 'required|unique:course_qualifications,slug',
            'institutionId' => 'required',
            'description' => 'sometimes'
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'institutionId.required' => 'please select an Institution'
        ]);

        $course = Course::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ]);

        $course->institution()->attach([$this->institutionId]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Course::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->description = $record->description;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:course_qualifications,name',
            'slug' => 'required|unique:course_qualifications,slug',
            'description' => 'sometimes',
            'institutionId' => [ 'required',
                Rule::unique('course_course_institution', 'course_institution_id')->where(function ($q){
                    return $q->where('course_id', $this->selectedId);
                })],
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'institutionId.required' => 'please select an Institution',
            'institutionId.unique' => 'This institution is already attach to this course'
        ]);


        if ($this->selectedId) {
            $record = Course::find($this->selectedId);

            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
            ]);

            $record->institution()->attach([$this->institutionId]);

            $this->resetInput();

            $this->updateMode = false;

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Institution Added',
                'timer'=>3000,
                'icon'=>'success',
                'toast'=>true,
                'position'=>'top-right'
            ]);

        }
    }

    public function detach($id, $institutionId)
    {
        if($id){
            $record = Course::find($id);
            $record->institution()->detach($institutionId);
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Course::where('id', $id);
            $record->delete();
        }
    }
}
