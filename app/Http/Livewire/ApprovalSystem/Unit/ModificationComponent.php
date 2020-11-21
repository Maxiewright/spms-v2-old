<?php

namespace App\Http\Livewire\ApprovalSystem\Unit;

use App\Models\Serviceperson\Unit;
use App\Services\AdministrationServices\ApprovalSystemService;
use Livewire\Component;
use Livewire\WithPagination;

class ModificationComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $title = 'Unit';

    protected $listeners = ['approveUnitModification', 'disapproveUnitModification'];

    public function approveUnitModification($id, $modId)
    {
        ApprovalSystemService::approveModification($id, $modId);
    }

    public function disapproveUnitModification($id, $modId)
    {
        ApprovalSystemService::disapproveModification($id, $modId);
    }

    public function render()
    {
        $searchTerm = $this->search . '%';

        return view('livewire.approval-system.unit.modification-component', [
            'data' => Unit::with([
                'serviceperson.currentJob.job.title', 'serviceperson.lastPromotion.rank',
                'serviceperson.phoneNumbers:number', 'serviceperson.emailAddresses:email',
                'modifications.modifier.serviceperson', 'modifications.disapprovals.disapprover.serviceperson.lastPromotion.rank',
            ])
                ->whereHas('modifications', function ($query){
                    $query->where('modifications', '>', 0);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ]);
    }
}
