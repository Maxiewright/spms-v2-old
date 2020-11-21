<?php

namespace App\Http\Livewire\Metadata\RecordCard\Extracurricular;

use App\Models\System\Serviceperson\Extracurricular\Hobby;
use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use Livewire\Component;
use Livewire\WithPagination;

class HobbyComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $filter;
    public $name, $selectedId,$typeId, $types;
    public $updateMode = false;
    public $title = 'Hobby';

    protected $listeners = ['hobby' => 'destroy'];

    public function mount()
    {
        $this->types = HobbyType::all('id', 'name');
    }


    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.extracurricular.hobby-component',[
            'data' => Hobby::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('hobby_type_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
//        $this->typeId = null;
        $this->name = null;
    }
    public function store()
    {
        $this->validate([
            'typeId' => 'required',
            'name' => 'required|unique:hobbies,name',
        ],[
            'typeId.required' => 'Select Hobby Type',
            'name.required' => 'Hobby is required'
        ]);

        Hobby::create([
            'hobby_type_id' => $this->typeId,
            'name' => $this->name,
        ]);

        $this->resetInput();
    }


    public function edit($id)
    {
        $record = Hobby::findOrFail($id);
        $this->selectedId = $id;
        $this->typeId = $record->hobby_type_id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {

        $this->validate([
            'selectedId' => 'required|numeric',
            'typeId' => 'required',
            'name' => 'required|unique:hobbies,name',
        ],[
            'typeId.required' => 'Select Hobby Type',
            'name.required' => 'Hobby is required'
        ]);

        if ($this->selectedId) {
            $record = Hobby::find($this->selectedId);
            $record->update([
                'hobby_type_id' => $this->typeId,
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Hobby::where('id', $id);
            $record->delete();
        }
    }

}
