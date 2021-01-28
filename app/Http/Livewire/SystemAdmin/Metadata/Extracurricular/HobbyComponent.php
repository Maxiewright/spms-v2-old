<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Extracurricular;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Extracurricular\Hobby;
use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class HobbyComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search, $filter;
    public $name, $selectedId, $typeId, $types;
    public $title = 'Hobby';

    protected $listeners = ['destroyHobby'];

    public function mount()
    {
        $this->types = HobbyType::all('id', 'name');
    }


    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.extracurricular.hobby-component',[
            'data' => Hobby::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('hobby_type_id', '=', $this->filter);
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
                Rule::unique('hobbies', 'name')
                    ->ignore($this->selectedId)
            ]
        ],[
            'typeId.required' => 'Select Hobby Type',
            'name.required' => 'Hobby is required'
        ]);

        Hobby::updateOrCreate(['id' => $this->selectedId], [
            'hobby_type_id' => $this->typeId,
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->resetInput();

        $this->showSuccessAlert();
    }


    public function edit($id)
    {
        $record = Hobby::findOrFail($id);

        $this->selectedId = $id;
        $this->typeId = $record->hobby_type_id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroyHobby($id)
    {
        if ($id) {
            $record = Hobby::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }
}
