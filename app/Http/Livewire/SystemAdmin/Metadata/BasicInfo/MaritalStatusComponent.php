<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\BasicInfo;


use App\Models\System\Universal\Lookup\MaritalStatus;
use Livewire\Component;
use Livewire\WithPagination;

class MaritalStatusComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Marital Status';

    protected $listeners = ['marital_status' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.basic-info.marital-status',[
            'data' =>  MaritalStatus::query()
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
            'name' => 'required|unique:marital_statuses,name',
        ],[
            'name.required' => 'This field is required'
        ]);
        MaritalStatus::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = MaritalStatus::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:marital_statuses,name',
        ],[
            'name.required' => 'This field is required'
        ]);
        if ($this->selectedId) {
            $record = MaritalStatus::find($this->selectedId);
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
            $record = MaritalStatus::where('id', $id);
            $record->delete();
        }
    }

}
