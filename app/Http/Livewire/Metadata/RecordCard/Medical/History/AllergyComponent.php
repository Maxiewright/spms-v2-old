<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\History;

use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\AllergyType;
use Livewire\Component;
use Livewire\WithPagination;

class AllergyComponent extends Component
{
    use WithPagination;


    public $search, $filter;
    public $name, $typeId, $selectedId, $types;
    public $updateMode = false;
    public $title = 'Allergy';

    protected $listeners = ['allergy' => 'destroy'];


    public function mount()
    {
        $this->types = AllergyType::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.metadata.record-card.medical.history.allergy-component',[
            'data' =>  Allergy::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query) {
                    $query->where('allergy_type_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->typeId = null;
    }
    public function store()
    {
        $this->validate([
            'typeId' => 'required',
            'name' => 'required|unique:allergies,name',
        ],[
            'name.required' => 'Division Or Region is required',
        ]);

        Allergy::create([
            'allergy_type_id' => $this->typeId,
            'name' => $this->name,
            'code' => $this->code
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Allergy::findOrFail($id);
        $this->selectedId = $id;
        $this->typeId = $record->allergy_type_id;
        $this->name = $record->name;
        $this->updateMode = true;

    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'typeId' => 'required',
            'name' => 'required|unique:allergies,name',
        ]);

        if ($this->selectedId) {
            $record = Allergy::find($this->selectedId);
            $record->update([
                'allergy_type_id' => $this->typeId,
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Allergy::where('id', $id);
            $record->delete();
        }
    }

}
