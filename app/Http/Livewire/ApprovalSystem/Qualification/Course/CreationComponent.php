<?php

namespace App\Http\Livewire\ApprovalSystem\Qualification\Course;

use App\Models\Serviceperson\ServicepersonCourse;
use App\Services\AdministrationServices\ApprovalSystemService;
use Approval\Models\Modification;
use Livewire\Component;
use Livewire\WithPagination;

class CreationComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $title = 'Course';
    public $type = "Creation";

    protected $listeners = ['approveCourseCreation', 'disapproveCourseCreation'];

    public function approveCourseCreation($id, $modId)
    {
        ApprovalSystemService::approveModification($id, $modId);
    }

    public function disapproveCourseCreation($id, $modId)
    {
        ApprovalSystemService::disapproveModification($id, $modId);
    }

    public function render()
    {
        $searchTerm = $this->search . '%';

        return view('livewire.approval-system.qualification.course.creation-component', [
            'data' => ServicepersonCourse::with([
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
