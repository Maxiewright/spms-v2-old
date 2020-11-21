<?php

namespace App\Http\Livewire\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPathEstablishment;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CareerPathEstablishmentComponent extends Component
{
    use  WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filterCareerPath, $filterRank;
    public $updateMode, $ranks, $rankId, $careerPaths, $careerPathId, $establishment, $selectedId;
    public $title='Career Path Establishment';

    protected $listeners = ['career_path_establishment' => 'destroy'];

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

        return view('livewire.career-management.career-management-system.career-path-establishment-component',[
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
        $this->rankId = null;
        $this->careerPathId = null;
        $this->establishment = null;
    }
    public function store()
    {
        $this->performValidation();

        CareerPathEstablishment::create([
            'rank_id' => $this->rankId,
            'career_path_id' => $this->careerPathId,
            'establishment' => $this->establishment,
        ]);

        $this->resetInput();
    }
    public function edit($career_path_id, $rank_id)
    {
        $record = CareerPathEstablishment::where(function($query) use($career_path_id, $rank_id){
            $query->where('career_path_id', '=', $career_path_id)
                ->where('rank_id', '=', $rank_id);
        })->first();

        $this->rankId = $record->rank_id;
        $this->careerPathId = $record->career_path_id;
        $this->establishment = $record->establishment;

        $this->updateMode = true;
    }


    public function update()
    {

//        $this->performValidation();
        $this->validate([
            'establishment' => 'required|numeric'
        ],[
            'establishment.required' => 'An established strength is required',
            'establishment.numeric' => 'Establishment must be a number'
        ]);

        if ($this->rankId && $this->careerPathId) {
            $record = CareerPathEstablishment::where(function($query){
                $query->where('career_path_id', '=', $this->careerPathId)
                    ->where('rank_id', '=', $this->rankId);
            });

//            dd($record);
            $record->update([
                'rank_id' => $this->rankId,
                'career_path_id' => $this->careerPathId,
                'establishment' => $this->establishment,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($career_path_id, $rank_id)
    {
        if ($rank_id && $career_path_id) {
            $record = CareerPathEstablishment::where(function($query) use($career_path_id, $rank_id){
                $query->where('career_path_id', '=', $career_path_id)
                    ->where('rank_id', '=', $rank_id);
            });

            $record->delete();
        }
    }

    private function performValidation()
    {
        $this->validate([
            'rankId' => [ 'required',
                Rule::unique('career_path_establishment', 'rank_id')->where(function ($q){
                    return $q->where('career_path_id', $this->careerPathId);
                })],

            'careerPathId' => [ 'required',
                Rule::unique('career_path_establishment', 'career_path_id')->where(function ($q){
                    return $q->where('rank_id', $this->rankId);
                })],

            'establishment' => 'required|numeric'
        ],[
            'randId.required' => 'Rank is required',
            'rankId.unique' => 'This combination of rank and career path already exist',
            'careerPathId.required' => 'Branch is Required',
            'careerPathId.unique' => 'This combination of career path and rank already exist',
            'establishment.required' => 'An established strength is required',
            'establishment.numeric' => 'Establishment must be a number'
        ]);
    }
}
