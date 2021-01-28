<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\History;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\AllergyType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AllergyComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search, $filter;
    public $name, $selectedId, $typeId, $types;
    public $title = 'Allergy';

    protected $listeners = ['destroyAllergy'];

    public function mount()
    {
        $this->types = AllergyType::all('id', 'name');
    }


    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.medical.history.allergy-component',[
            'data' => Allergy::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('allergy_type_id', '=', $this->filter);
                })
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
        $this->reset(['name', 'typeId', 'selected_id']);
    }

    /**
     * Create and update record
     */
    public function store()
    {
        $this->validate( [
            'typeId' => 'required',
            'name' => [
                'required',
                Rule::unique('allergies', 'name')
                    ->ignore($this->selectedId)
            ]
        ],[
            'typeId.required' => 'Select Allergy Type',
            'name.required' => 'Allergy is required'
        ]);

        Allergy::updateOrCreate(['id' => $this->selectedId], [
            'allergy_type_id' => $this->typeId,
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->resetInput();

        $this->showSuccessAlert();
    }


    public function edit($id)
    {
        $record = Allergy::findOrFail($id);

        $this->selectedId = $id;
        $this->typeId = $record->allergy_type_id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroyAllergy($id)
    {
        if ($id) {
            $record = Allergy::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
