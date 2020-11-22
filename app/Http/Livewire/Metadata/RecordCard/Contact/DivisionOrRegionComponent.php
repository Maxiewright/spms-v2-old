<?php

namespace App\Http\Livewire\Metadata\RecordCard\Contact;

use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Serviceperson\Address\DivisionOrRegionType;
use Livewire\Component;
use Livewire\WithPagination;

class DivisionOrRegionComponent extends Component
{
    use WithPagination;


    public $search, $filter;
    public $name, $code, $typeId, $selectedId, $types;
    public $updateMode = false;
    public $title = 'Division or Region';

    protected $listeners = ['division_or_region' => 'destroy'];


    public function mount()
    {
        $this->types = DivisionOrRegionType::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.metadata.record-card.contact.division-or-region-component',[
            'data' =>  DivisionOrRegion::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query) {
                    $query->where('division_or_region_type_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->code = null;
        $this->typeId = null;
    }
    public function store()
    {
        $this->validate([
            'typeId' => 'required',
            'name' => 'required|unique:division_or_regions,name',
            'code' => 'required',
        ],[
            'name.required' => 'Division Or Region is required',
            'code.required' => 'Code is required'
        ]);

        DivisionOrRegion::create([
            'division_or_region_type_id' => $this->typeId,
            'name' => $this->name,
            'code' => $this->code
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = DivisionOrRegion::findOrFail($id);
        $this->selectedId = $id;
        $this->typeId = $record->division_or_region_type_id;
        $this->name = $record->name;
        $this->code = $record->code;
        $this->updateMode = true;

    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'typeId' => 'required',
            'name' => 'required|unique:division_or_regions,name',
            'code' => 'required',
        ]);

        if ($this->selectedId) {
            $record = DivisionOrRegion::find($this->selectedId);
            $record->update([
                'division_or_region_type_id' => $this->typeId,
                'name' => $this->name,
                'code' => $this->code
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = DivisionOrRegion::where('id', $id);
            $record->delete();
        }
    }

}
