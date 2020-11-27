<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\Unit;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyComponent extends Component
{
    use WithPagination, WithAlerts, WithModal;


    public $search, $filter;
    public $name, $slug, $parentUnitId, $selectedId, $parentUnits;
    public $title = 'Company';

    protected $listeners = ['destroyCompany'];


    public function mount()
    {
        $this->parentUnits = Battalion::all('id', 'slug');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.unit.company-component',[
            'data' =>  Company::query()
                ->with('battalion')
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use($searchTerm){
                    $query->where('name', 'like', $searchTerm)
                        ->orWhere('slug', 'like', $searchTerm);
                })
                ->when($this->filter, function ($query) {
                    $query->where('battalion_id', '=', $this->filter);
                })
                ->paginate(15)
        ]);
    }

    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset(['name', 'slug', 'parentUnitId', 'selectedId']);
    }

    public function store()
    {
        $this->validate([
            'parentUnitId' => 'required',
            'name' => [
                'required',
                Rule::unique('companies', 'name')
                ->ignore($this->selectedId)
            ],
           'slug' => [
                'required',
                Rule::unique('companies', 'slug')
                    ->ignore($this->selectedId)
            ],
        ],[
            'parentUnitId.required' => 'Please select parent unit',
            'name.required' => 'Company name is required',
            'slug.required' => 'Short name is required',
            'slug.unique' => 'Short name is already in use'
        ]);

        Company::updateOrCreate(['id' => $this->selectedId ],[
            'battalion_id' => $this->parentUnitId,
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Company::findOrFail($id);
        $this->selectedId = $id;
        $this->parentUnitId = $record->battalion_id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();

    }

    public function destroyCompany($id)
    {
        if ($id) {
            $record = Company::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }
}
