<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class BranchComponent extends Component
{
    use WithPagination, WithModal;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Branch';

    protected $listeners = ['branch' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.career-management-system.branch-component',[
            'data' =>  Branch::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:branches,name',
            'slug' => 'required|unique:branches,slug'
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required'
        ]);

        Branch::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Branch::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required'
        ]);

        if ($this->selectedId) {
            $record = Branch::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Branch::where('id', $id);
            $record->delete();
        }
    }
}
