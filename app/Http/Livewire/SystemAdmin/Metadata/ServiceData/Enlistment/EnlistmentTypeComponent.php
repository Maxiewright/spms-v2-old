<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\Enlistment;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class EnlistmentTypeComponent extends Component
{

    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Enlistment Type';

    protected $listeners = ['destroyEnlistmentType'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.enlistment.enlistment-type-component',[
            'data' =>  EnlistmentType::query()
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
        $this->reset(['name', 'slug', 'selectedId']);
    }
    public function store()
    {
        $this->validate([
            'name' => [
                'required',
                Rule::unique('enlistment_types' )
                    ->ignore($this->selectedId)
            ],

            'slug' => [
                'required',
                Rule::unique('enlistment_types' )
                    ->ignore($this->selectedId)
            ],
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'slug.unique' => 'Short Name already in use'
        ]);

        EnlistmentType::updateOrCreate(['id' => $this->selectedId],[
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = EnlistmentType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();
    }


    public function destroyEnlistmentType($id)
    {
        if ($id) {
            $record = EnlistmentType::where('id', $id);
            $record->delete();
        }
    }
}
