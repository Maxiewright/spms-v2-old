<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\BioData;

use App\Models\System\Serviceperson\Biodata\Weight;
use Livewire\Component;
use Livewire\WithPagination;

class WeightComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Weight';

    protected $listeners = ['weight' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.medical.bio-data.weight-component',[
            'data' => Weight::query()
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
            'name' => 'required|unique:weights,name',
        ],[
            'name.required' => 'Weight is required'
        ]);

        Weight::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Weight::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:weights,name',
        ]);

        if ($this->selectedId) {
            $record = Weight::find($this->selectedId);
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
            $record = Weight::where('id', $id);
            $record->delete();
        }
    }

}