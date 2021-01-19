<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\Unit;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PlatoonComponent extends Component
{

    use WithPagination, WithAlerts, WithModal;


    public $search, $filter;
    public $name, $slug, $parentUnitId, $selectedId, $parentUnits;
    public $title = 'Platoon or Department';

    protected $listeners = ['destroyPlatoonOrDepartment'];

    public function mount()
    {
        $this->parentUnits = Company::all('id', 'slug');
    }

    public function render()
    {

        $searchTerm = '%' . $this->search . '%';
        return view('livewire.system-admin.metadata.service-data.unit.platoon-component', [
            'data' => Platoon::query()
                ->with('company')
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm)
                        ->orWhere('slug', 'like', $searchTerm);
                })
                ->when($this->filter, function ($query) {
                    $query->where('company_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset('name', 'slug', 'parentUnitId', 'selected_id');
    }

    public function store()
    {
        $this->validate([
            'parentUnitId' => 'required',
            'name' => [
                'required',
                Rule::unique('platoons')->ignore($this->selectedId)
            ],

            'slug' => [
                'required',
                Rule::unique('platoons')->ignore($this->selectedId)
            ],
        ], [
            'parentUnitId.required' => 'Please select parent unit',
            'name.required' => 'Division Or Region is required',
            'slug.required' => 'Short Name is required',
            'slug.unique' => 'Short Name is already in use'
        ]);

        Platoon::updateOrCreate(['id' => $this->selectedId],[
            'company_id' => $this->parentUnitId,
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Platoon::findOrFail($id);
        $this->selectedId = $id;
        $this->parentUnitId = $record->company_id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();

    }

    public function destroyPlatoonOrDepartment($id)
    {
        if ($id) {
            $record = Platoon::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }
}
