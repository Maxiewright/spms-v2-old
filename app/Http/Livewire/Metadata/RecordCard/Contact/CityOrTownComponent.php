<?php

namespace App\Http\Livewire\Metadata\RecordCard\Contact;

use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use Livewire\Component;
use Livewire\WithPagination;

class CityOrTownComponent extends Component
{
    use WithPagination;


    public $search, $filter;
    public $name, $divisionOrRegionId, $divisionOrRegions, $selectedId;
    public $updateMode = false;
    public $title = 'City Or Town';

    protected $listeners = ['city_or_town' => 'destroy'];

    public function mount()
    {
        $this->divisionOrRegions = DivisionOrRegion::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.metadata.record-card.contact.city-or-town-component',[
            'data' =>  CityOrTown::query()
                ->with('divisionOrRegion')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('division_or_region_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->divisionOrRegionId = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:division_or_regions,name',
            'divisionOrRegionId' => 'required'
        ],[
            'name.required' => 'CityOrTown is required',
            'divisionOrRegionId.required' => 'please select Division or Region'
        ]);

        CityOrTown::create([
            'division_or_region_id' => $this->divisionOrRegionId,
            'name' => $this->name,
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = CityOrTown::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->divisionOrRegionId = $record->division_or_region_id;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:division_or_regions,name',
            'divisionOrRegionId' => 'required'
        ],[
            'name.required' => 'CityOrTown is required',
            'divisionOrRegionId.required' => 'please select Division or Region'
        ]);

        if ($this->selectedId) {
            $record = CityOrTown::find($this->selectedId);
            $record->update([
                'division_or_region_id' => $this->divisionOrRegionId,
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = CityOrTown::where('id', $id);
            $record->delete();
        }
    }

    public function validatedData()
    {
        $this->validate([
            'name' => 'required',
            'divisionOrRegionId' => 'required'
        ],[
            'name.required' => 'CityOrTown is required',
            'divisionOrRegionId.required' => 'please select Division or Region'
        ]);
    }


}
