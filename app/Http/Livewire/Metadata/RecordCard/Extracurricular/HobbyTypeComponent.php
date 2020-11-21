<?php

namespace App\Http\Livewire\Metadata\RecordCard\Extracurricular;

use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use Livewire\Component;
use Livewire\WithPagination;

class HobbyTypeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Hobby Type';

    protected $listeners = ['hobby_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.extracurricular.hobby-type-component',[
            'data' => HobbyType::query()
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
            'name' => 'required|unique:hobby_types,name',
        ],[
            'name.required' => 'Hobby Type is required'
        ]);

        HobbyType::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = HobbyType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:hobby_types,name',
        ]);

        if ($this->selectedId) {
            $record = HobbyType::find($this->selectedId);
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
            $record = HobbyType::where('id', $id);
            $record->delete();
        }
    }
}
