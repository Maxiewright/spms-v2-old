<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Identification\DriversPermit;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ClassComponent extends Component
{

    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Drivers Permit Class';

    protected $listeners = ['destroyDriversPermitClass'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.identification.drivers-permit.class-component',[
            'data' =>  DriversPermitClass::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    /**
     * Show the create form
     */
    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset(['name', 'slug', 'selected_id']);
    }
    public function store()
    {
        $this->validate([
            'name' => [
                'required',
                Rule::unique('drivers_permit_classes' )
                    ->ignore($this->selectedId)
            ],

            'slug' => [
                'required',
                Rule::unique('drivers_permit_classes' )
                    ->ignore($this->selectedId)
            ],
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'slug.unique' => 'Short Name already in use'
        ]);

        DriversPermitClass::updateOrCreate(['id' => $this->selectedId],[
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = DriversPermitClass::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();
    }


    public function destroyDriversPermitClass($id)
    {
        if ($id) {
            $record = DriversPermitClass::where('id', $id);
            $record->delete();
        }
    }

}
