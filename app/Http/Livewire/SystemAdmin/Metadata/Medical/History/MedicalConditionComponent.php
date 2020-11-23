<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\History;

use App\Models\System\Serviceperson\Medical\MedicalCondition;
use Livewire\Component;
use Livewire\WithPagination;

class MedicalConditionComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Medical Condition';

    protected $listeners = ['medical_condition' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.medical.history.medical-condition-component',[
            'data' =>  MedicalCondition::query()
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
            'name' => 'required|unique:medical_conditions,name',
        ],[
            'name.required' => 'MedicalCondition is required'
        ]);

        MedicalCondition::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = MedicalCondition::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:medical_conditions,name',
        ]);

        if ($this->selectedId) {
            $record = MedicalCondition::find($this->selectedId);
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
            $record = MedicalCondition::where('id', $id);
            $record->delete();
        }
    }

}
