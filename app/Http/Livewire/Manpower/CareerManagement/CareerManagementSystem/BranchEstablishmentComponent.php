<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\BranchEstablishment;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class BranchEstablishmentComponent extends Component
{
    use  WithPagination, WithModal, WithAlerts;

    public $search = '';
    public $filterBranch, $filterRank;
    public $ranks, $rank_id, $branches, $branch_id, $establishment, $selectedId;
    public $title = 'Branch Establishment';

    protected $listeners = ['destroyBranchEstablishment'];

    // Rules defined in store method

    protected $messages = [
        'rand_id.required' => 'Rank is required',
        'rank_id.unique' => 'This combination of rank and branch already exist',
        'branch_id.required' => 'Branch is Required',
        'branch_id.unique' => 'This combination of branch and rank already exist',
        'establishment.required' => 'An established strength is required',
        'establishment.numeric' => 'Establishment must be a number'
    ];

    public function mount()
    {
        $this->ranks = Rank::select('id', 'regiment')
            ->where(function ($query) {
                $query->where('id', '<=', 8)
                    ->where('id', '>', 1);
            })->get();

        $this->branches = Branch::all('id', 'name');
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';

        return view('livewire.manpower.career-management.career-management-system.branch-establishment-component', [
            'data' => BranchEstablishment::query()
                ->with('branch', 'rank')
                ->orderBy('created_at', 'DESC')
                ->where(function ($query) use ($searchTerm) {
                    $query->whereHas('branch', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm)
                            ->orwhere('slug', 'like', $searchTerm);
                    })
                        ->orWhereHas('rank', function ($query) use ($searchTerm) {
                            $query->where('regiment', 'like', $searchTerm)
                                ->orWhere('regiment_slug', 'like', $searchTerm);
                        });
                })
                ->when($this->filterBranch, function ($query) {
                    $query->where('branch_id', '=', $this->filterBranch);
                })
                ->when($this->filterRank, function ($query) {
                    $query->where('rank_id', '=', $this->filterRank);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->rank_id = null;
        $this->branch_id = null;
        $this->establishment = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'rank_id' => ['required',
                Rule::unique('branch_establishment', 'rank_id')->where(function ($q) {
                    return $q->where('branch_id', $this->branch_id);
                })->ignore($this->selectedId)
            ],

            'branch_id' => ['required',
                Rule::unique('branch_establishment', 'branch_id')->where(function ($q) {
                    return $q->where('rank_id', $this->rank_id);
                })->ignore($this->selectedId)
            ],

            'establishment' => 'required|numeric'
        ]);

        BranchEstablishment::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {

        $record = BranchEstablishment::findOrFail($id);

        $this->selectedId = $id;
        $this->rank_id = $record->rank_id;
        $this->branch_id = $record->branch_id;
        $this->establishment = $record->establishment;

        $this->openModal();
    }

    public function destroyBranchEstablishment($id)
    {
        if ($id) {

            $record = BranchEstablishment::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }

    }

}
