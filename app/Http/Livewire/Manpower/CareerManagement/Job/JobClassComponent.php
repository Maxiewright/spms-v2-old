<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Job;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\Job\JobClass;
use Livewire\Component;
use Livewire\WithPagination;

class JobClassComponent extends Component
{
    use WithPagination, WithModal;


    public $search = '';
    public $name, $slug, $description, $selectedId;
    public $updateMode = false;
    public $title = 'Job Class';

    protected $listeners = ['job_class' => 'destroy'];

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.job.job-class-component',[
            'data' =>  JobClass::query()
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
        $this->description = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:job_titles,name',
            'slug' => 'required',
            'description' => 'sometimes'
        ],[
            'name.required' => 'Job title is  required',
            'slug.required' => 'Short Name is required'
        ]);

        JobClass::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = JobClass::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->description = $record->description;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'sometimes',
        ],[
            'name.required' => 'Job class is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = JobClass::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = JobClass::where('id', $id);
            $record->delete();
        }
    }
}
