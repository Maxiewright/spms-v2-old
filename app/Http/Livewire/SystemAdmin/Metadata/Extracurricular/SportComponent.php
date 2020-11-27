<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Extracurricular;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Extracurricular\Sport;
use App\Models\System\Serviceperson\Extracurricular\SportType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class SportComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;


    public $search, $filter;
    public $name, $selectedId, $typeId, $types;
    public $title = 'Sport';

    protected $listeners = ['destroySport'];

    public function mount()
    {
        $this->types = SportType::all('id', 'name');
    }


    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.extracurricular.sport-component',[
            'data' => Sport::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('sport_type_id', '=', $this->filter);
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
        $this->reset(['name', 'typeId', 'selectedId']);
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
                Rule::unique('sports', 'name')
                    ->ignore($this->selectedId)
            ]
        ],[
            'typeId.required' => 'Select Sport Type',
            'name.required' => 'Sport is required'
        ]);

        Sport::updateOrCreate(['id' => $this->selectedId], [
            'sport_type_id' => $this->typeId,
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->resetInput();

        $this->showSuccessAlert();
    }


    public function edit($id)
    {
        $record = Sport::findOrFail($id);

        $this->selectedId = $id;
        $this->typeId = $record->sport_type_id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroySport($id)
    {
        if ($id) {
            $record = Sport::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
