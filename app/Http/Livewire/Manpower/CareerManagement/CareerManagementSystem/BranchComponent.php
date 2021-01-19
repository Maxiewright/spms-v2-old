<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class BranchComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Branch';

    protected $listeners = ['destroyBranch'];

    // Rules defined in store method

    protected $messages = [
        'name.required' => 'Please fill out this field',
        'slug.required' => 'Short name is required'
    ];

    public function render()
    {

        $searchTerm = '%' . $this->search . '%';
        return view('livewire.manpower.career-management.career-management-system.branch-component', [
            'data' => Branch::query()
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
        $validatedData = $this->validate([
            'name' => [
                'required', Rule::unique('branches', 'name')->ignore($this->selectedId)
            ],
            'slug' => [
                'required', Rule::unique('branches', 'slug')->ignore($this->selectedId)
            ]
        ]);

        Branch::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Branch::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();


    }


    public function destroyBranch($id)
    {

        if ($id) {
            $record = Branch::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }
}
