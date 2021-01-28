<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Job;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\Job\JobTitleCategory;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class JobTitleCategoryComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search = '';
    public $name, $slug, $description, $selectedId;
    public $updateMode = false;
    public $title = 'Job Title';

    protected $listeners = ['destroyJobTitleCategory'];

    // Validation rules in store method
    protected $messages = [
        'name.required' => 'Job title is  required',
        'slug.required' => 'Short Name is required'
    ];

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.job.job-title-category-component',[
            'data' =>  JobTitleCategory::query()
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
        $validatedData = $this->validate([
            'name' => [
                'required',
                Rule::unique('job_titles', 'name')->ignore($this->selectedId)
            ],
            'slug' => 'required',
            'description' => 'sometimes'
        ]);

        JobTitleCategory::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = JobTitleCategory::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->description = $record->description;

        $this->openModal();
    }


    public function destroyJobTitleCategory($id)
    {
        if ($id) {

            $record = JobTitleCategory::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }

}
