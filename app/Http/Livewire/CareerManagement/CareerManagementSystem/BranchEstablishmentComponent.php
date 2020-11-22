<?php

namespace App\Http\Livewire\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\BranchEstablishment;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class BranchEstablishmentComponent extends Component
{
    use  WithPagination;


    public $search = '';
    public $filterBranch, $filterRank;
    public $updateMode, $ranks, $rankId, $branches, $branchId, $establishment, $selectedId;
    public $title='Branch Establishment';

    protected $listeners = ['branch_establishment' => 'destroy'];

    public function mount()
    {
        $this->ranks = Rank::select('id', 'regiment')
            ->where(function ($query){
                $query->where('id', '<=', 8)
                    ->where('id', '>', 1);
        })->get();
        $this->branches = Branch::all('id', 'name');

    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.career-management.career-management-system.branch-establishment-component',[
            'data' => BranchEstablishment::query()
                ->with('branch', 'rank')
                ->orderBy('created_at', 'DESC')
                ->where(function ($query) use($searchTerm){
                    $query->whereHas('branch', function ($query) use($searchTerm){
                        $query->where('name', 'like', $searchTerm)
                            ->orwhere('slug', 'like', $searchTerm);
                    })
                    ->orWhereHas('rank', function ($query) use($searchTerm){
                        $query->where('regiment', 'like', $searchTerm)
                            ->orWhere('regiment_slug', 'like', $searchTerm);
                    });
                })
                ->when($this->filterBranch, function ($query){
                    $query->where('branch_id', '=',$this->filterBranch);
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
        $this->branchId = null;
        $this->establishment = null;
    }
    public function store()
    {
        $this->performValidation();



        BranchEstablishment::create([
            'rank_id' => $this->rankId,
            'branch_id' => $this->branchId,
            'establishment' => $this->establishment,
        ]);

        $this->resetInput();
    }
    public function edit($branch_id, $rank_id)
    {
        $record = BranchEstablishment::where(function($query) use($branch_id, $rank_id){
            $query->where('branch_id', '=', $branch_id)
                ->where('rank_id', '=', $rank_id);
        })->first();

        $this->rankId = $record->rank_id;
        $this->branchId = $record->branch_id;
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

        if ($this->rankId && $this->branchId) {
            $record = BranchEstablishment::where(function($query){
                $query->where('branch_id', '=', $this->branchId)
                    ->where('rank_id', '=', $this->rankId);
            });

//            dd($record);
            $record->update([
                'rank_id' => $this->rankId,
                'branch_id' => $this->branchId,
                'establishment' => $this->establishment,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($branch_id, $rank_id)
    {
        if ($rank_id && $branch_id) {
            $record = BranchEstablishment::where(function($query) use($branch_id, $rank_id){
                $query->where('branch_id', '=', $branch_id)
                    ->where('rank_id', '=', $rank_id);
            });

            $record->delete();
        }
    }

    private function performValidation()
    {
        $this->validate([
            'rankId' => [ 'required',
                Rule::unique('branch_establishment', 'rank_id')->where(function ($q){
                    return $q->where('branch_id', $this->branchId);
                })],

            'branchId' => [ 'required',
                Rule::unique('branch_establishment', 'branch_id')->where(function ($q){
                    return $q->where('rank_id', $this->rankId);
                })],

            'establishment' => 'required|numeric'
        ],[
            'randId.required' => 'Rank is required',
            'rankId.unique' => 'This combination of rank and branch already exist',
            'branchId.required' => 'Branch is Required',
            'branchId.unique' => 'This combination of branch and rank already exist',
            'establishment.required' => 'An established strength is required',
            'establishment.numeric' => 'Establishment must be a number'
        ]);
    }
}
