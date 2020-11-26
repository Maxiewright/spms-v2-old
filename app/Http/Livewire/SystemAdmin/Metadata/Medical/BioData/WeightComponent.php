<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\BioData;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Biodata\Weight;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class WeightComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;

    public $search = '';
    public $name, $selectedId;
    public $title = 'Weight';

    protected $listeners = ['destroy'];

    /**
     * Render the component view
     *
     * @return Application|Factory|View
     */
    public function render()
    {

        $searchTerm = '%' . $this->search . '%';

        return view('livewire.system-admin.metadata.medical.bio-data.weight-component', [
            'data' => Weight::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(20)
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

        Weight::updateOrCreate(['id' => $this->selectedId], [
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
        $record = Weight::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroy($id)
    {
        if ($id) {
            $record = Weight::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
