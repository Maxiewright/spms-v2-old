<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\History;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Medical\MedicalCondition;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MedicalConditionComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search = '';
    public $name, $selectedId;
    public $title = 'Medical Condition';

    protected $listeners = ['destroyMedicalCondition'];

    /**
     * Render the component view
     *
     * @return Application|Factory|View
     */
    public function render()
    {

        $searchTerm = '%' . $this->search . '%';

        return view('livewire.system-admin.metadata.medical.history.medical-condition-component', [
            'data' => MedicalCondition::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    /**
     * Show the create form
     */
    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    /**
     * Reset input fields
     */
    private function resetInput()
    {
        $this->name = null;
        $this->selectedId = null;
    }

    /**
     * Create and update record
     */
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:ethnicities,name',
        ], [
            'name.required' => 'This field is required'
        ]);

        MedicalCondition::updateOrCreate(['id' => $this->selectedId], [
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->resetInput();

        $this->showSuccessAlert();

    }

    /**
     * Show the edit form
     * @param $id
     */
    public function edit($id)
    {
        $record = MedicalCondition::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroyMedicalCondition($id)
    {
        if ($id) {
            $record = MedicalCondition::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
