<?php

namespace App\Http\Livewire\Metadata\RecordCard\ServiceData\Enlistment;

use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Livewire\Component;
use Livewire\WithPagination;

class EnlistmentTypeComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Enlistment Type';

    protected $listeners = ['enlistment_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.service-data.enlistment.enlistment-type-component',[
            'data' =>  EnlistmentType::query()
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
            'name' => 'required|unique:enlistment_types,name',
            'slug' => 'required'
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required'
        ]);

        EnlistmentType::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = EnlistmentType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:enlistment_types,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = EnlistmentType::find($this->selectedId);
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
            $record = EnlistmentType::where('id', $id);
            $record->delete();
        }
    }
}
