<?php

namespace App\Http\Livewire\Metadata\RecordCard\ServiceData\Enlistment;

use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use Livewire\Component;
use Livewire\WithPagination;

class EngagementPeriodComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Engagement Period';

    protected $listeners = ['engagement_period' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.service-data.enlistment.engagement-period-component',[
            'data' =>  EngagementPeriod::query()
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
            'name' => 'required|unique:enlistment_types,name',
            'slug' => 'required'
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required'
        ]);

        EngagementPeriod::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = EngagementPeriod::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:enlistment_types,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = EngagementPeriod::find($this->selectedId);
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
            $record = EngagementPeriod::where('id', $id);
            $record->delete();
        }
    }

}
