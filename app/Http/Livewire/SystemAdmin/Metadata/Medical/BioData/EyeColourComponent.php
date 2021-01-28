<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\BioData;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Biodata\EyeColour;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class EyeColourComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search = '';
    public $name, $selectedId;
    public $title = 'Eye Colour';

    protected $listeners = ['destroyEyeColour'];

    /**
     * Render the component view
     *
     * @return Application|Factory|View
     */
    public function render()
    {

        $searchTerm = '%' . $this->search . '%';

        return view('livewire.system-admin.metadata.medical.bio-data.eye-colour-component', [
            'data' => EyeColour::query()
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

        EyeColour::updateOrCreate(['id' => $this->selectedId], [
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
        $record = EyeColour::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroyEyeColour($id)
    {
        if ($id) {
            $record = EyeColour::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }
}
