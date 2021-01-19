<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CareerPathComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;

    public $search = '';
    public $filterStream;
    public $name, $slug, $stream_id, $streams, $selectedId;
    public $updateMode = false;
    public $title = 'Career Path';

    protected $listeners = ['destroyCareerPath'];

    // Rules are in the store method

    protected $messages = [
        'name.required' => 'Please fill out this field',
        'slug.required' => 'Short name is required',
        'stream_id.required' => 'Branch is required',
    ];

    public function mount()
    {
        $this->streams = Stream::all('id', 'name');
    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.career-management-system.career-path-component',[
            'data' =>  CareerPath::query()
                ->with('stream')
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use ($searchTerm){
                    $query->where('name', 'like', $searchTerm)
                        ->orWhere('slug', 'like', $searchTerm)
                        ->orWhereHas('stream', function ($query) use($searchTerm){
                            $query->where('name', 'like', $searchTerm);
                        });
                })
                ->when($this->filterStream, function ($query){
                    $query->where('stream_id', '=', $this->filterStream);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->stream_id = null;
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
            'stream_id' => 'required|unique:streams,slug'
        ]);

        CareerPath::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = CareerPath::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->stream_id = $record->stream_id;

        $this->openModal();
    }

    public function destroyCareerPath($id)
    {
        if ($id) {
            $record = CareerPath::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }
}
