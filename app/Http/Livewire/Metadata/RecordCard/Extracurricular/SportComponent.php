<?php

namespace App\Http\Livewire\Metadata\RecordCard\Extracurricular;

use App\Models\System\Serviceperson\Extracurricular\Sport;
use App\Models\System\Serviceperson\Extracurricular\SportType;
use Livewire\Component;
use Livewire\WithPagination;

class SportComponent extends Component
{
    use WithPagination;

    public $search, $filter;
    public $name, $selectedId,$typeId, $types;
    public $updateMode = false;
    public $title = 'Sport';

    protected $listeners = ['sport' => 'destroy'];

    public function mount()
    {
        $this->types = SportType::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.extracurricular.sport-component',[
            'data' =>  Sport::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('sport_type_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->typeId = '';
    }
    public function store()
    {
        $this->validate([
            'typeId' => 'required',
            'name' => 'required|unique:sports,name',
        ],[
            'typeId.required' => 'Select Sport Type',
            'name.required' => 'Sport is required'
        ]);

        Sport::create([
            'sport_type_id' => $this->typeId,
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Sport::findOrFail($id);
        $this->selectedId = $id;
        $this->typeId = $record->sport_type_id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'typeId' => 'required',
            'name' => 'required',
        ],[
            'typeId.required' => 'Select Sport Type',
            'name.required' => 'Sport is required'
        ]);

        if ($this->selectedId) {
            $record = Sport::find($this->selectedId);
            $record->update([
                'sport_type_id' => $this->typeId,
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Sport::where('id', $id);
            $record->delete();
        }
    }

}
