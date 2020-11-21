<?php

namespace App\Http\Livewire\Metadata\RecordCard\ServiceData\Unit;

use App\Models\System\Serviceperson\Unit\Section;
use Livewire\Component;
use Livewire\WithPagination;

class SectionComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Section or Sub-department';

    protected $listeners = ['section' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.service-data.unit.section-component',[
            'data' =>  Section::query()
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
            'name' => 'required|unique:sections,name',
            'slug' => 'required'
        ],[
            'name.required' => 'Section name is required',
            'slug.required' => 'Short Name is required'
        ]);

        Section::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Section::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:sections,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Section name required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = Section::find($this->selectedId);
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
            $record = Section::where('id', $id);
            $record->delete();
        }
    }
}
