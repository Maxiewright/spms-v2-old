<?php

namespace App\Http\Livewire\Metadata\RecordCard\BasicInfo;

use App\Models\System\Universal\Lookup\Ethnicity;
use Livewire\Component;
use Livewire\WithPagination;

class EthnicityComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Ethnicity';

    protected $listeners = ['ethnicity' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.basic-info.ethnicity',[
            'data' =>  Ethnicity::query()
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
            'name' => 'required|unique:ethnicities,name',
        ],[
            'name.required' => 'This field is required'
        ]);

        Ethnicity::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Ethnicity::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:ethnicities,name',
        ],[
            'name.required' => 'Please fill out this field is required'
        ]);

        if ($this->selectedId) {
            $record = Ethnicity::find($this->selectedId);
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
            $record = Ethnicity::where('id', $id);
            $record->delete();
        }
    }

}
