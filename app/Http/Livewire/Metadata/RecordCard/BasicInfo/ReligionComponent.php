<?php

namespace App\Http\Livewire\Metadata\RecordCard\BasicInfo;

use App\Models\System\Universal\Lookup\Religion;
use Livewire\Component;
use Livewire\WithPagination;

class ReligionComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Religion';

    protected $listeners = ['religion' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.basic-info.religion',[
            'data' =>  Religion::query()
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
            'name' => 'required|unique:religions,name',
        ],[
            'name.required' => 'This field is required'
        ]);

        Religion::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Religion::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:religions,name',
        ],[
            'name.required' => 'This field is required'
        ]);

        if ($this->selectedId) {
            $record = Religion::find($this->selectedId);
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
            $record = Religion::where('id', $id);
            $record->delete();
        }
    }

}
