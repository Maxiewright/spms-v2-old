<?php

namespace App\Http\Livewire\Metadata\RecordCard\ServiceData;

use App\Models\System\Serviceperson\ServiceData\Decoration;
use Livewire\Component;
use Livewire\WithPagination;

class DecorationComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Decoration';

    protected $listeners = ['decoration' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.service-data.decoration-component',[
            'data' =>  Decoration::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->where('slug', 'like', $searchTerm)
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
            'name' => 'required|unique:decorations,name',
            'slug' => 'required'
        ],[
            'name.required' => 'Decoration is required',
            'slug.required' => 'Short Name is required'
        ]);

        Decoration::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Decoration::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:decorations,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Decoration is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = Decoration::find($this->selectedId);
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
            $record = Decoration::where('id', $id);
            $record->delete();
        }
    }
}
