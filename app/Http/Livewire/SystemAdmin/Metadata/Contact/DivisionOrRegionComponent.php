<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Contact;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Serviceperson\Address\DivisionOrRegionType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DivisionOrRegionComponent extends Component
{
    use WithPagination, WithAlerts, WithModal;


    public $search, $filter;
    public $name, $code, $typeId, $selectedId, $types;
    public $title = 'Division or Region';

    protected $listeners = ['destroyDivisionOrRegion'];


    public function mount()
    {
        $this->types = DivisionOrRegionType::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.system-admin.metadata.contact.division-or-region-component',[
            'data' =>  DivisionOrRegion::query()
                ->with('type')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->when($this->filter, function ($query) {
                    $query->where('division_or_region_type_id', '=', $this->filter);
                })
                ->paginate(20)
        ]);
    }

    private function resetInput()
    {
        $this->reset(['name', 'code', 'typeId', 'selected_id']);
    }

    public function store()
    {
        $this->validate([
            'typeId' => 'required',
            'name' => [
                'required',
                Rule::unique('division_or_regions', 'name')->ignore($this->selectedId)
            ],
            'code' => [
                'required',
                Rule::unique('division_or_regions', 'code')->ignore($this->selectedId)
            ],
        ],[
            'typeId.required' => 'Division Or Region Type is required',
            'name.required' => 'Division Or Region is required',
            'code.required' => 'Code is required'
        ]);

        DivisionOrRegion::updateOrCreate(['id' => $this->selectedId],[
            'division_or_region_type_id' => $this->typeId,
            'name' => $this->name,
            'code' => $this->code
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
           'name' => [
               Rule::unique('division_or_regions', 'name')
                   ->ignore($this->selectedId)
           ],
            'code' => [
        Rule::unique('division_or_regions', 'code')
            ->ignore($this->selectedId)]
        ]);

    }

    public function edit($id)
    {
        $record = DivisionOrRegion::findOrFail($id);

        $this->selectedId = $id;
        $this->typeId = $record->division_or_region_type_id;
        $this->name = $record->name;
        $this->code = $record->code;

        $this->openModal();

    }

    public function destroyDivisionOrRegion($id)
    {
        if ($id) {
            $record = DivisionOrRegion::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
