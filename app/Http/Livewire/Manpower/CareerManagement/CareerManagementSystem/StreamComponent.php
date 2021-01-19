<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class StreamComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $filter;
    public $name, $slug, $branch_id, $branches, $selectedId;
    public $title = 'Stream';

    protected $listeners = [ 'destroyStream'];

    // Rules defined in store method

    protected $messages = [
        'name.required' => 'Please fill out this field',
        'slug.required' => 'Short name is required',
        'branch_id.required' => 'Branch is required',
    ];

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
        $this->branch_id = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => [
                'required',
                Rule::unique('streams', 'name')->ignore($this->selectedId)
            ],
            'slug' => [
                'required',
                Rule::unique('streams', 'slug')->ignore($this->selectedId)
            ],

            'branch_id' => 'required'
        ]);

        Stream::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Stream::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->branch_id = $record->branch_id;

        $this->openModal();
    }

    public function destroyStream($id)
    {
        if ($id) {

            $record = Stream::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }
}
