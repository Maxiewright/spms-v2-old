<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\Unit;

use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use Livewire\Component;
use Livewire\WithPagination;

class PlatoonComponent extends Component
{

    use WithPagination;


    public $search, $filter;
    public $name, $slug, $parentUnitId, $selectedId, $parentUnits;
    public $updateMode = false;
    public $title = 'Platoon or Department';

    protected $listeners = ['platoon' => 'destroy'];


    public function mount()
    {
        $this->parentUnits = Company::all('id', 'slug');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.unit.platoon-component',[
            'data' =>  Platoon::query()
                ->with('company')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->where('slug', 'like', $searchTerm)
                ->when($this->filter, function ($query) {
                    $query->where('company_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->parentUnitId = null;
    }
    public function store()
    {
        $this->validate([
            'parentUnitId' => 'required',
            'name' => 'required|unique:platoons,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Division Or Region is required',
            'slug.required' => 'Code is required'
        ]);

        Platoon::create([
            'company_id' => $this->parentUnitId,
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Platoon::findOrFail($id);
        $this->selectedId = $id;
        $this->parentUnitId = $record->company_id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;

    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'parentUnitId' => 'required',
            'name' => 'required|unique:platoons,name',
            'slug' => 'required',
        ]);

        if ($this->selectedId) {
            $record = Platoon::find($this->selectedId);
            $record->update([
                'company_id' => $this->parentUnitId,
                'name' => $this->name,
                'slug' => $this->slug
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Platoon::where('id', $id);
            $record->delete();
        }
    }
}
