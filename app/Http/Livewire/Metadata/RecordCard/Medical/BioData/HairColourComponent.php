<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\BioData;

use App\Models\System\Serviceperson\Biodata\HairColour;
use Livewire\Component;
use Livewire\WithPagination;

class HairColourComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Hair Colour';

    protected $listeners = ['hair_colour' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.medical.bio-data.hair-colour-component',[
            'data' => HairColour::query()
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
            'name' => 'required|unique:hair_colours,name',
        ],[
            'name.required' => 'HairColour is required'
        ]);

        HairColour::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = HairColour::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:hair_colours,name',
        ]);

        if ($this->selectedId) {
            $record = HairColour::find($this->selectedId);
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
            $record = HairColour::where('id', $id);
            $record->delete();
        }
    }

}
