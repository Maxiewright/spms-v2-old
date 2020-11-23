<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Identification\DriversPermit;

use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use Livewire\Component;
use Livewire\WithPagination;

class ClassComponent extends Component
{

    use WithPagination;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Drivers Permit Class';

    protected $listeners = ['drivers_permit_class' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.identification.drivers-permit.class-component',[
            'data' =>  DriversPermitClass::query()
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
            'name' => 'required|unique:drivers_permit_classes,name',
            'slug' => 'required'
        ],[
            'name.required' => 'Class is required',
            'slug.required' => 'Short Name is required'
        ]);

        DriversPermitClass::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = DriversPermitClass::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:drivers_permit_classes,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Class is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = DriversPermitClass::find($this->selectedId);
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
            $record = DriversPermitClass::where('id', $id);
            $record->delete();
        }
    }

}
