<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialtyComponent extends Component
{
    use WithPagination, WithModal;


    public $search = '';
    public $filter;
    public $name, $slug, $careerPathId, $careerPaths, $selectedId;
    public $updateMode = false;
    public $title = 'Specialty';

    protected $listeners = ['specialty' => 'destroy'];

    public function mount()
    {
        $this->careerPaths = CareerPath::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.career-management-system.specialty-component',[
            'data' =>  Specialty::query()
                ->with('careerPath')
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use ($searchTerm){
                    $query->where('name', 'like', $searchTerm)
                        ->orWhere('slug', 'like', $searchTerm)
                        ->orWhereHas('careerPath', function ($query) use($searchTerm){
                            $query->where('name', 'like', $searchTerm);
                        });
                })
                ->when($this->filter, function ($query){
                    $query->where('career_path_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->careerPathId = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:specialties,name',
            'slug' => 'required|unique:specialties,slug',
            'careerPathId' => 'required'
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required',
            'careerPathId.required' => 'Career Path is required',
        ]);

        Specialty::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'career_path_id' => $this->careerPathId
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Specialty::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->careerPathId = $record->career_path_id;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'careerPathId' => 'required',
        ],[
            'name.required' => 'Please fill out this field',
            'slug.required' => 'Short name is required',
            'careerPathId.required' => 'Career Path is required'
        ]);

        if ($this->selectedId) {
            $record = Specialty::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'career_path_id' => $this->careerPathId,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Specialty::where('id', $id);
            $record->delete();
        }
    }
}
