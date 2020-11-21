<?php

namespace App\Http\Livewire\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Livewire\Component;
use Livewire\WithPagination;

class CareerPathComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filter;
    public $name, $slug, $streamId, $streams, $selectedId;
    public $updateMode = false;
    public $title = 'Career Path';

    protected $listeners = ['career_path' => 'destroy'];

    public function mount()
    {
        $this->streams = Stream::all('id', 'name');
    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.career-management-system.career-path-component',[
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
                ->when($this->filter, function ($query){
                    $query->where('stream_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->streamId = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:streams,name',
            'slug' => 'required|unique:streams,slug',
            'streamId' => 'required|unique:streams,slug'
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required',
            'streamId.required' => 'Branch is required',
        ]);

        CareerPath::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'stream_id' => $this->streamId
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = CareerPath::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->streamId = $record->stream_id;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'streamId' => 'required',
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required',
            'streamId.required' => 'Branch is required'
        ]);

        if ($this->selectedId) {
            $record = CareerPath::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'stream_id' => $this->streamId,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = CareerPath::where('id', $id);
            $record->delete();
        }
    }
}
