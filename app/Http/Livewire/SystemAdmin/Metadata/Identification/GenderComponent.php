<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Identification;

use App\Models\System\Universal\Lookup\Gender;
use Livewire\Component;
use Livewire\WithPagination;

class GenderComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Gender';

    protected $listeners = ['gender' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.identification.gender-component',[
            'data' =>  Gender::query()
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
            'name' => 'required|unique:genders,name',
        ],[
            'name.required' => 'Gender is required'
        ]);

        Gender::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Gender::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:genders,name',
        ]);

        if ($this->selectedId) {
            $record = Gender::find($this->selectedId);
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
            $record = Gender::where('id', $id);
            $record->delete();
        }
    }

}
