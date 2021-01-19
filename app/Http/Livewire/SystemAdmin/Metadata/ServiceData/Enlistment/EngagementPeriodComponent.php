<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\Enlistment;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class EngagementPeriodComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $name, $slug, $selectedId;
    public $title = 'Engagement Period';

    protected $listeners = ['destroyEngagementPeriod'];

    public function render()
    {

        $searchTerm = '%' . $this->search . '%';
        return view('livewire.system-admin.metadata.service-data.enlistment.engagement-period-component', [
            'data' => EngagementPeriod::query()
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
                Rule::unique('engagement_periods', 'name')
                    ->ignore($this->selectedId)
            ],

            'slug' => [
                'required',
                'numeric',
                Rule::unique('enlistment_types', 'slug')
                    ->ignore($this->selectedId)
            ],
        ], [
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'slug.unique' => 'Short Name already in use',
            'slug.numeric' => 'Engagement short name must be a number',
        ]);


        EngagementPeriod::updateOrCreate(['id' => $this->selectedId], [
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function updated($slug)
    {
        $this->validateOnly($slug, [
            'slug' => 'numeric'
        ]);
    }

    public function edit($id)
    {
        $record = EngagementPeriod::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();
    }


    public function destroyEngagementPeriod($id)
    {
        if ($id) {
            $record = EngagementPeriod::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
