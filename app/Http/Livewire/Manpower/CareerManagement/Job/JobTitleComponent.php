<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Job;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use App\Models\System\Serviceperson\CareerManagement\Job\JobTitleCategory;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class JobTitleComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search = '';
    public $jobTitleCategories;
    public $name, $slug, $description, $selectedId;
    public $updateMode = false;
    public $title = 'Job Title';

    protected $listeners = ['destroyJobTitle'];

    public function mount(){
        $this->jobTitleCategories = JobTitleCategory::all('id','name');
    }

    // Validation rules in store method
    protected $messages = [
        'name.required' => 'Job title is  required',
        'slug.required' => 'Short Name is required'
    ];

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

        JobTitle::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = JobTitle::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->description = $record->description;

        $this->openModal();
    }

    public function destroyJobTitle($id)
    {
        if ($id) {

            $record = JobTitle::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.job.job-title-component',[
            'data' =>  JobTitle::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

}
