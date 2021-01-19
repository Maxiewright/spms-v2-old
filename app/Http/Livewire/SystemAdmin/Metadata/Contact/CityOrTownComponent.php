<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Contact;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CityOrTownComponent extends Component
{
    use WithPagination, WithAlerts, WithModal;


    public $search, $filter;
    public $name, $divisionOrRegionId, $divisionOrRegions, $selectedId;
    public $title = 'City Or Town';

    protected $listeners = ['destroyCityOrTown'];

    public function mount()
    {
        $this->divisionOrRegions = DivisionOrRegion::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.system-admin.metadata.contact.city-or-town-component',[
            'data' =>  CityOrTown::query()
                ->with('divisionOrRegion')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query){
                    $query->where('division_or_region_id', '=', $this->filter);
                })
                ->paginate(20)
        ]);
    }

    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset(['name', 'divisionOrRegionId', 'selected_id']);
    }

    public function store()
    {
        $this->validate([
            'name' => [
                'required',
                Rule::unique('city_or_towns', 'name')->where(function ($query){
                    $query->where('division_or_region_id', $this->divisionOrRegionId);
                })
                    ->ignore($this->selectedId)
            ],
            'divisionOrRegionId' => 'required'
        ],[

            'name.required' => 'CityOrTown is required',
            'name.unique' => 'City or Town already exist in the select Division or Region ',
            'divisionOrRegionId.required' => 'please select Division or Region'
        ]);

        CityOrTown::updateOrCreate(['id' => $this->selectedId], [
            'division_or_region_id' => $this->divisionOrRegionId,
            'name' => $this->name,
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = CityOrTown::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->divisionOrRegionId = $record->division_or_region_id;

        $this->openModal();
    }

    public function destroyCityOrTown($id)
    {
        if ($id) {
            $record = CityOrTown::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
