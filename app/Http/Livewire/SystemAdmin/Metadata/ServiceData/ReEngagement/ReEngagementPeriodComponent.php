<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\ReEngagement;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\ServiceData\ReEngagementPeriod;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ReEngagementPeriodComponent extends Component
{

    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'ReEngagement Period';

    protected $listeners = ['destroyReEngagementPeriod'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.re-engagement.re-engagement-period-component',[
            'data' =>  ReEngagementPeriod::query()
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

        ReEngagementPeriod::updateOrCreate(['id' => $this->selectedId],[
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = ReEngagementPeriod::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();
    }


    public function destroyReEngagementPeriod($id)
    {
        if ($id) {
            $record = ReEngagementPeriod::where('id', $id);
            $record->delete();
        }
    }


}
