<?php

namespace App\Http\Livewire\Metadata\RecordCard\Medical\BioData;

use App\Models\System\Serviceperson\Biodata\EyeColour;
use Livewire\Component;
use Livewire\WithPagination;

class EyeColourComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $selectedId;
    public $updateMode = false;
    public $title = 'Eye Colour';

    protected $listeners = ['eye_colour' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.medical.bio-data.eye-colour-component',[
            'data' =>  EyeColour::query()
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
            'name' => 'required|unique:eye_colours,name',
        ],[
            'name.required' => 'EyeColour is required'
        ]);

        EyeColour::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = EyeColour::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:eye_colours,name',
        ]);

        if ($this->selectedId) {
            $record = EyeColour::find($this->selectedId);
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
            $record = EyeColour::where('id', $id);
            $record->delete();
        }
    }
}