<?php

namespace App\Http\Livewire\Metadata\RecordCard\ServiceData\Unit;

use App\Models\System\Serviceperson\Unit\Battalion;
use Livewire\Component;
use Livewire\WithPagination;

class BattalionComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Battalion';

    protected $listeners = ['battalion' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.service-data.unit.battalion-component',[
            'data' =>  Battalion::query()
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
            'name' => 'required|unique:battalions,name',
            'slug' => 'required'
        ],[
            'name.required' => 'Battalion is required',
            'slug.required' => 'Short Name is required'
        ]);

        Battalion::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Battalion::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:battalions,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Battalion is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = Battalion::find($this->selectedId);
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
            $record = Battalion::where('id', $id);
            $record->delete();
        }
    }

}
