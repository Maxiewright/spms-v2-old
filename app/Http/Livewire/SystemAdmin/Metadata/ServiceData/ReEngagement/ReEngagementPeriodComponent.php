<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData\ReEngagement;

use App\Models\System\Serviceperson\ServiceData\ReEngagementPeriod;
use Livewire\Component;
use Livewire\WithPagination;

class ReEngagementPeriodComponent extends Component
{

    use WithPagination;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Re-engagement Type';

    protected $listeners = ['re_engagement' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.re-engagement.re-engagement-period-component',[
            'data' =>  ReEngagementPeriod::query()
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

        ReEngagementPeriod::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = ReEngagementPeriod::findOrFail($id);
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
            $record = ReEngagementPeriod::find($this->selectedId);
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
            $record = ReEngagementPeriod::where('id', $id);
            $record->delete();
        }
    }


}
