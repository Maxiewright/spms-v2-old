<?php

namespace App\Http\Livewire\Manpower\Reports;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonDetail;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Livewire\Component;
use Livewire\WithPagination;

class RetirementReport extends Component
{
    use WithPagination;



    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $year = '';
    public $ranks, $rankId;

    public function mount()
    {
        $this->ranks = Rank::all('id', 'regiment', 'regiment_slug');
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        return view('livewire.manpower.reports.retirement-report', [
            'servicepeople' => Serviceperson::query()
                ->with('lastPromotion')
                ->orderBy('crod', 'asc')
                ->where('number', 'like', $searchTerm)
                ->orWhere('first_name', 'like', $searchTerm)
                ->orWhere('last_name', 'like', $searchTerm)
                ->orWhereYear('crod', 'like', $searchTerm)
                ->whereHas('lastPromotion', function ($query) use ($searchTerm) {
                    $query->when($this->rankId, function ($query) {
                        $query->where('rank_id', '=', $this->rankId);
                    });
                })
                ->when($this->startDate && $this->endDate, function ($query) {
                    $query->whereBetween('crod', [$this->startDate, $this->endDate]);
                })
                ->paginate(10)
        ]);
    }
}
