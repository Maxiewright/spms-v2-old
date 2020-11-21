<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\History;

use App\Models\System\Serviceperson\Medical\AllergyType;
use Livewire\Component;
use Livewire\WithPagination;

class AllergyTypeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Allergy Type';

    protected $listeners = ['allergy_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.medical.history.allergy-type-component',[
            'data' =>  AllergyType::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:allergy_types,name',
        ],[
            'name.required' => 'This field is required'
        ]);

        AllergyType::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = AllergyType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:allergy_types,name',
        ]);

        if ($this->selectedId) {
            $record = AllergyType::find($this->selectedId);
            $record->update([
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = AllergyType::where('id', $id);
            $record->delete();
        }
    }

}
