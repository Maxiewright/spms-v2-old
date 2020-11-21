<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\History;

use App\Models\System\Serviceperson\Medical\Vaccine;
use Livewire\Component;
use Livewire\WithPagination;

class VaccineComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Vaccine';

    protected $listeners = ['vaccine' => 'destroy'];

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.medical.history.vaccine-component',[
            'data' =>  Vaccine::query()
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
            'name' => 'required|unique:vaccines,name',
        ],[
            'name.required' => 'Vaccine is required'
        ]);

        Vaccine::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Vaccine::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:vaccines,name',
        ]);

        if ($this->selectedId) {
            $record = Vaccine::find($this->selectedId);
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
            $record = Vaccine::where('id', $id);
            $record->delete();
        }
    }

}
