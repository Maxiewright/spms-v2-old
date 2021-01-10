<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Livewire\Component;
use Livewire\WithPagination;

class StreamComponent extends Component
{
    use WithPagination, WithModal;


    public $search = '';
    public $filter;
    public $name, $slug, $branchId, $branches, $selectedId;
    public $updateMode = false;
    public $title = 'Stream';

    protected $listeners = ['stream' => 'destroy'];

    public function mount()
    {
        $this->branches = Branch::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.career-management-system.stream-component',[
            'data' =>  Stream::query()
                ->with('branch')
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use ($searchTerm){
                    $query->where('name', 'like', $searchTerm)
                        ->orWhere('slug', 'like', $searchTerm)
                        ->orWhereHas('branch', function ($query) use($searchTerm){
                            $query->where('name', 'like', $searchTerm);
                        });
                })
                ->when($this->filter, function ($query){
                    $query->where('branch_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->branchId = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:branches,name',
            'slug' => 'required|unique:branches,slug',
            'branchId' => 'required|unique:branches,slug'
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required',
            'branchId.required' => 'Branch is required',
        ]);

        Stream::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'branch_id' => $this->branchId
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Stream::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->branchId = $record->branch_id;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'branchId' => 'required',
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required',
            'branchId.required' => 'Branch is required'
        ]);

        if ($this->selectedId) {
            $record = Stream::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'branch_id' => $this->branchId,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Stream::where('id', $id);
            $record->delete();
        }
    }
}
