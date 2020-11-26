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

    public function create()
    {

        $this->openModal();
        $this->resetInput();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInput()
    {
        $this->name = null;
        $this->selectedId = null;
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

    public function destroy($id)
    {
        if ($id) {
            $record = MaritalStatus::where('id', $id);
            $record->delete();
        }
    }

}
