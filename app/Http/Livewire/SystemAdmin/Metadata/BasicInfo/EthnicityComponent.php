<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\BasicInfo;

use App\Models\System\Universal\Lookup\Ethnicity;
use Livewire\Component;
use Livewire\WithPagination;

class EthnicityComponent extends Component
{

    use WithPagination;

    public $search = '';
    public $name, $selectedId;
    public $title = 'Ethnicity';
    public $isOpen  = false;

    protected $listeners = ['destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.system-admin.metadata.basic-info.ethnicity',[
            'data' =>  Ethnicity::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'This is a success alert!!',
            'timeout' => 10000
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
            'name' => 'required|unique:ethnicities,name',
        ],[
            'name.required' => 'This field is required'
        ]);

        Ethnicity::updateOrCreate(['id' => $this->selectedId],[
            'name' => $this->name,
        ]);

        session()->flash('message', $this->selectedId ? 'Updated Successfully.' : 'Created Successfully.');

        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Ethnicity::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;

        $this->openModal();
    }
    public function confirmDelete($id)
    {
        $this->emit("swal:confirm", showDeleteConfirmation($id));
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroy($id)
    {
        if ($id) {
            $record = Ethnicity::where('id', $id);
            $record->delete();
        }
    }



}
