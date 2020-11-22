<?php

namespace App\Http\Livewire\ApprovalSystem\Qualification\Education;

use App\Models\Serviceperson\ServicepersonEducation;
use App\Services\AdministrationServices\ApprovalSystemService;
use Livewire\Component;
use Livewire\WithPagination;

class ModificationComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $title = 'Education';

    protected $listeners = ['approveEducationModification', 'disapproveEducationModification'];

    public function approveEducationModification($id, $modId)
    {
        ApprovalSystemService::approveModification($id, $modId);
    }

    public function disapproveEducationModification($id, $modId)
    {
        ApprovalSystemService::disapproveModification($id, $modId);
    }

    public function render()
    {
        $searchTerm = $this->search . '%';

        return view('livewire.approval-system.qualification.education.modification-component', [
            'data' => ServicepersonEducation::with([
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
