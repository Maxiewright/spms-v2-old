<?php

namespace App\Http\Livewire\CareerManagement\Job;

use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use Livewire\Component;
use Livewire\WithPagination;

class JobTitleComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $description, $selectedId;
    public $updateMode = false;
    public $title = 'Job Title';

    protected $listeners = ['job_title' => 'destroy'];

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.job.job-title-component',[
            'data' =>  JobTitle::query()
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

        JobTitle::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = JobTitle::findOrFail($id);

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
            'name' => 'required',
            'slug' => 'required',
            'description' => 'sometimes',
        ],[
            'name.required' => 'Job Title is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = JobTitle::find($this->selectedId);
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
            $record = JobTitle::where('id', $id);
            $record->delete();
        }
    }
}
