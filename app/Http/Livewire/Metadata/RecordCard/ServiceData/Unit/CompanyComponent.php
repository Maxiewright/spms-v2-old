<?php

namespace App\Http\Livewire\Metadata\RecordCard\ServiceData\Unit;

use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyComponent extends Component
{
    use WithPagination;


    public $search, $filter;
    public $name, $slug, $parentUnitId, $selectedId, $parentUnits;
    public $updateMode = false;
    public $title = 'Company';


    protected $listeners = ['company' => 'destroy'];


    public function mount()
    {
        $this->parentUnits = Battalion::all('id', 'slug');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.service-data.unit.company-component',[
            'data' =>  Company::query()
                ->with('battalion')
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->where('slug', 'like', $searchTerm)
                ->when($this->filter, function ($query) {
                    $query->where('battalion_id', '=', $this->filter);
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
            'name' => 'required|unique:companies,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Company name is required',
            'slug.required' => 'Short name is required'
        ]);

        Company::create([
            'battalion_id' => $this->parentUnitId,
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Company::findOrFail($id);
        $this->selectedId = $id;
        $this->parentUnitId = $record->battalion_id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;

    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'parentUnitId' => 'required',
            'name' => 'required|unique:companies,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Company name is required',
            'slug.required' => 'Short name is required'
        ]);

        if ($this->selectedId) {
            $record = Company::find($this->selectedId);
            $record->update([
                'battalion_id' => $this->parentUnitId,
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
            $record = Company::where('id', $id);
            $record->delete();
        }
    }
}
