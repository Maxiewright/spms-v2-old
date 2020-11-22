<?php

namespace App\Http\Livewire\ApprovalSystem\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Services\AdministrationServices\ApprovalSystemService;
use Livewire\Component;
use Livewire\WithPagination;

class CreationComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $title = 'Serviceperson';

    protected $listeners = ['approveServicepersonCreation', 'disapproveServicepersonCreation'];

    public function approveServicepersonCreation($id, $modId)
    {
        ApprovalSystemService::approveModification($id, $modId);
    }

    public function disapproveServicepersonCreation($id, $modId)
    {
        ApprovalSystemService::disapproveModification($id, $modId);
    }

    public function render()
    {
        $searchTerm = $this->search . '%';

        return view('livewire.approval-system.serviceperson.creation-component', [
            'data' => Serviceperson::with([
                'user.serviceperson', 'photo:path', 'currentUnit.company', 'currentJob.job.title',
                'lastPromotion.rank', 'phoneNumbers:number', 'emailAddresses:email', 'modifications.modifier.serviceperson',
                'modifications.disapprovals.disapprover.serviceperson.lastPromotion.rank',
            ])->whereHas('modifications', function ($query) {
                $query->where('modifications', '>', 0);
            })->orderBy('created_at', 'desc')
                ->paginate(10)

        ]);
    }
}
