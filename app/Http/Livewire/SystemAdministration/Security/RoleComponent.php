<?php

namespace App\Http\Livewire\SystemAdministration\Security;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $search = '';
    public  $name, $selectedId;
    public $updateMode = false;
    public $title = 'Role';
    public $permissions, $rolePermissions = [];
    public $record;

    protected $listeners = ['permission' => 'destroy'];


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $this->permissions = Permission::all('id', 'name');
        $searchTerm = '%' .$this->search . '%';

        return view('livewire.system-administration.security.role-component', [
            'data' => Role::query()
                ->orderBy('created_at', 'DESC')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }


    private function resetInput()
    {
        $this->name = null;
        $this->rolePermissions = null;
    }

    public function store()
    {
//        dd($this->rolePermissions);
        $this->validate([
            'name' => 'required | unique:roles,name',
            'rolePermissions.*' => 'required'
        ]);


        $role = Role::create(['name' => $this->name]);

        $role->syncPermissions($this->rolePermissions);

        $this->resetInput();
    }

    public function edit($id)
    {
        $this->record = Role::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $this->record->name;
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
            $record = Role::find($this->selectedId);
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
            $record = Role::where('id', $id);
            $record->delete();
        }
    }

}
