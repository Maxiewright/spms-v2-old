<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Medical\BioData;

use App\Models\System\Serviceperson\Biodata\Height;
use Livewire\Component;
use Livewire\WithPagination;

class HeightComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Height';

    protected $listeners = ['height' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.medical.bio-data.height-component',[
            'data' =>  Height::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|digits_between:120,215|unique:heights,name',
        ],[
            'name.required' => 'Height is required',
            'name.digits_between' => 'Height must be a number(in CM) between 120 - 215'
        ]);

        Height::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Height::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|digits_between:120,215|unique:heights,name',
        ],[
            'name.required' => 'Height is required',
            'name.digits_between' => 'Height must be a number(in CM) between 120 - 215'
        ]);

        if ($this->selectedId) {
            $record = Height::find($this->selectedId);
            $record->update([
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Height::where('id', $id);
            $record->delete();
        }
    }

}
