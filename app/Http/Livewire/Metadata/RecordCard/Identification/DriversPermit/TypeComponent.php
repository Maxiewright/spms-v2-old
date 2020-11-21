<?php

namespace App\Http\Livewire\Metadata\RecordCard\Identification\DriversPermit;

use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use Livewire\Component;
use Livewire\WithPagination;

class TypeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Drivers Permit Type';

    protected $listeners = ['drivers_permit_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.identification.drivers-permit.type-component',[
            'data' =>  DriversPermitType::query()
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
            'name' => 'required|unique:drivers_permit_types,name',
        ],[
            'name.required' => 'DriversPermitType is required'
        ]);

        DriversPermitType::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = DriversPermitType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:drivers_permit_types,name',
        ]);

        if ($this->selectedId) {
            $record = DriversPermitType::find($this->selectedId);
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
            $record = DriversPermitType::where('id', $id);
            $record->delete();
        }
    }

}
