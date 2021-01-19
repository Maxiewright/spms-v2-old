<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPathEstablishment;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CareerPathEstablishmentComponent extends Component
{
    use  WithPagination, WithModal, WithAlerts;

    public $search = '';
    public $filterCareerPath, $filterRank;
    public $updateMode, $ranks, $rank_id, $careerPaths, $career_path_id, $establishment, $selectedId;
    public $title='Career Path Establishment';

    protected $listeners = [ 'destroyCareerPathEstablishment'];

    // Validation rules are in the store method
    protected $messages = [
        'rank_id.required' => 'Rank is required',
        'rank_id.unique' => 'This combination of rank and career path already exist',
        'career_path_id.required' => 'Branch is Required',
        'career_path_id.unique' => 'This combination of career path and rank already exist',
        'establishment.required' => 'An established strength is required',
        'establishment.numeric' => 'Establishment must be a number'
    ];

    public function mount()
    {
        $this->ranks = Rank::select('id', 'regiment')
            ->where(function ($query){
                $query->where('id', '<=', 8)
                    ->where('id', '>', 1);
            })->get();
        $this->careerPaths = CareerPath::all('id', 'name');

    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.manpower.career-management.career-management-system.career-path-establishment-component',[
            'data' => CareerPathEstablishment::query()
                ->with('careerPath', 'rank')
                ->orderBy('created_at', 'DESC')
                ->where(function ($query) use($searchTerm){
                    $query->whereHas('careerPath', function ($query) use($searchTerm){
                        $query->where('name', 'like', $searchTerm)
                            ->orwhere('slug', 'like', $searchTerm);
                    })
                        ->orWhereHas('rank', function ($query) use($searchTerm){
                            $query->where('regiment', 'like', $searchTerm)
                                ->orWhere('regiment_slug', 'like', $searchTerm);
                        });
                })
                ->when($this->filterCareerPath, function ($query){
                    $query->where('career_path_id', '=',$this->filterCareerPath);
                })
                ->when($this->filterRank, function ($query){
                    $query->where('rank_id', '=',$this->filterRank);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->rank_id = null;
        $this->career_path_id = null;
        $this->establishment = null;
    }
    public function store()
    {
        $validationData = $this->validate([
            'rank_id' => [ 'required',
                Rule::unique('career_path_establishment', 'rank_id')->where(function ($q){
                    return $q->where('career_path_id', $this->career_path_id);
                })->ignore($this->selectedId)
            ],

            'career_path_id' => [ 'required',
                Rule::unique('career_path_establishment', 'career_path_id')->where(function ($q){
                    return $q->where('rank_id', $this->rank_id);
                })->ignore($this->selectedId)
            ],

            'establishment' => 'required|numeric'
        ]);

        CareerPathEstablishment::updateOrCreate(['id' => $this->selectedId], $validationData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = CareerPathEstablishment::findOrFail($id);

        $this->selectedId = $id;
        $this->rank_id = $record->rank_id;
        $this->career_path_id = $record->career_path_id;
        $this->establishment = $record->establishment;

        $this->openModal();
    }

    public function destroy($id)
    {
        if ($id) {

            $record = CareerPathEstablishment::findOrFail($id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }

}
