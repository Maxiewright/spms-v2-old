<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\BasicInfo;

use App\Models\System\Universal\Lookup\Relationship;
use Livewire\Component;
use Livewire\WithPagination;

class RelationshipComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Relationship';

    protected $listeners = ['relationship' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.basic-info.relationship',[
            'data' =>  Relationship::query()
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
            'name' => 'required|unique:relationships,name',
        ],[
            'name.required' => 'This field is required'
        ]);
        Relationship::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Relationship::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:relationships,name',
        ],[
            'name.required' => 'This field is required'
        ]);

        if ($this->selectedId) {
            $record = Relationship::find($this->selectedId);
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
            $record = Relationship::where('id', $id);
            $record->delete();
        }
    }

}
