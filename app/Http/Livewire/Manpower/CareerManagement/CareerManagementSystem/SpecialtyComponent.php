<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Specialty;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialtyComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search = '';
    public $filter;
    public $name, $slug, $career_path_id, $careerPaths, $selectedId;
    public $title = 'Specialty';

    protected $listeners = ['destroySpecialty'];

    //Validation rule are in the store method
    protected $messages = [
        'name.required' => 'Please fill out this field',
        'slug.required' => 'Short name is required',
        'career_path_id.required' => 'Career Path is required',
    ];

    public function mount()
    {
        $this->careerPaths = CareerPath::all('id', 'name');
    }

    public function render()
    {

        $searchTerm = '%' . $this->search . '%';
        return view('livewire.manpower.career-management.career-management-system.specialty-component', [
            'data' => Specialty::query()
                ->with('careerPath')
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm)
                        ->orWhere('slug', 'like', $searchTerm)
                        ->orWhereHas('careerPath', function ($query) use ($searchTerm) {
                            $query->where('name', 'like', $searchTerm);
                        });
                })
                ->when($this->filter, function ($query) {
                    $query->where('career_path_id', '=', $this->filter);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->career_path_id = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => ['required',
                Rule::unique('specialties', 'name')->ignore($this->selectedId)
            ],
            'slug' => ['required',
                Rule::unique('specialties', 'slug')->ignore($this->selectedId)
            ],
            'career_path_id' => 'required'
        ]);

        Specialty::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Specialty::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->career_path_id = $record->career_path_id;

        $this->openModal();
    }

    public function destroySpecialty($id)
    {
        if ($id) {
            $record = Specialty::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }
}
