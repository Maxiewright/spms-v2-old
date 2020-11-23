<?php

namespace App\Http\Livewire\SystemAdministration\Security;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionComponent extends Component
{
    use WithPagination;


    public  $search = '';
    public  $name, $selectedId;
    public $updateMode = false;
    public $title = 'Permission';

    protected $listeners = ['permission' => 'destroy'];


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {

        $searchTerm = '%' .$this->search . '%';

        return view('livewire.system-administration.security.permission-component', [
            'data' => Permission::query()
                ->orderBy('created_at', 'DESC')
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
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create(['name' => $this->name]);
    }

    public function edit($id)
    {
        $record = Permission::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:ethnicities,name',
        ],[
            'name.required' => 'Please fill out this field is required'
        ]);

        if ($this->selectedId) {
            $record = Permission::find($this->selectedId);
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
            $record = Permission::where('id', $id);
            $record->delete();
        }
    }
}
