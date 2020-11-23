<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Extracurricular;

use App\Models\System\Serviceperson\Extracurricular\SportType;
use Livewire\Component;
use Livewire\WithPagination;

class SportTypeComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Sport Type';

    protected $listeners = ['sport_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.extracurricular.sport-type-component',[
            'data' =>  SportType::query()
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
            'name' => 'required|unique:sport_types,name',
        ],[
            'name.required' => 'Sport Type is required'
        ]);

        SportType::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = SportType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:sport_types,name',
        ]);

        if ($this->selectedId) {
            $record = SportType::find($this->selectedId);
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
            $record = SportType::where('id', $id);
            $record->delete();
        }
    }
}
