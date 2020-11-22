<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\BioData;

use App\Models\System\Serviceperson\Biodata\SkinColour;
use Livewire\Component;
use Livewire\WithPagination;

class SkinColourComponent extends Component
{

    use WithPagination;


    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Skin Colour';

    protected $listeners = ['skin_colour' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.medical.bio-data.skin-colour-component',[
            'data' =>  SkinColour::query()
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
            'name' => 'required|unique:skin_colours,name',
        ],[
            'name.required' => 'SkinColour is required'
        ]);

        SkinColour::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = SkinColour::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:skin_colours,name',
        ]);

        if ($this->selectedId) {
            $record = SkinColour::find($this->selectedId);
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
            $record = SkinColour::where('id', $id);
            $record->delete();
        }
    }
}
