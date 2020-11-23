<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\BioData;

use App\Models\System\Serviceperson\Biodata\BloodType;
use Livewire\Component;
use Livewire\WithPagination;

class BloodTypeComponent extends Component
{

    use WithPagination;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Blood Type';

    protected $listeners = ['blood_type' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.medical.bio-data.blood-type-component',[
            'data' =>  BloodType::query()
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
            'name' => 'required|unique:blood_types,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Blood Type is required',
            'slug.required' => 'Sort Name is required'
        ]);

        BloodType::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = BloodType::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {

        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:blood_types,name',
            'slug' => 'required',
        ],[
            'name.required' => 'BloodType is required',
            'slug.required' => 'BloodType is required'
        ]);

        if ($this->selectedId) {
            $record = BloodType::find($this->selectedId);
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
            $record = BloodType::where('id', $id);
            $record->delete();
        }
    }
}
