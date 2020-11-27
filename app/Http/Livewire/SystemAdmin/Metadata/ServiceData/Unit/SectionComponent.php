<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\Unit;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\Unit\Section;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class SectionComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Section';

    protected $listeners = ['destroySection'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.unit.section-component',[
            'data' =>  Section::query()
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
                Rule::unique('sections' )
                    ->ignore($this->selectedId)
            ],

            'slug' => [
                'required',
                Rule::unique('sections' )
                    ->ignore($this->selectedId)
            ],
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'slug.unique' => 'Short Name already in use'
        ]);

        Section::updateOrCreate(['id' => $this->selectedId],[
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = Section::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();
    }


    public function destroySection($id)
    {
        if ($id) {
            $record = Section::where('id', $id);
            $record->delete();
        }
    }
}
