<?php

namespace App\Http\Livewire\ApprovalSystem\Dependent;

use App\Models\Serviceperson\Dependent;
use App\Services\AdministrationServices\ApprovalSystemService;
use Approval\Models\Modification;
use Livewire\Component;
use Livewire\WithPagination;

class CreationComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $title = 'Dependent';

    protected $listeners = ['approveDependentCreation', 'disapproveDependentCreation'];

    public function approveDependentCreation($id, $modId)
    {
        ApprovalSystemService::approveModification($id, $modId);
    }

    public function disapproveDependentCreation($id, $modId)
    {
        ApprovalSystemService::disapproveModification($id, $modId);
    }

    public function render()
    {
        $searchTerm = $this->search . '%';

        return view('livewire.approval-system.dependent.creation-component', [
            'data' => Dependent::with([
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
