<?php

namespace App\Http\Livewire\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\Job\JobClass;
use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Livewire\Component;
use Livewire\WithPagination;

class ServicepeopleComponent extends Component
{
    use WithPagination;


    public $search;

    public $filterRank, $filterJob, $filterUnit;
    public $rankId;
    public $ranks;

    public function mount()
    {
        $this->jobTitles = JobTitle::all('id', 'name');
        $this->classes = JobClass::all('id', 'name');
        $this->careerPaths = CareerPath::all('id', 'name');
        $this->ranks = Rank::all('id', 'regiment_slug');
    }


    public function render()
    {
        $searchTerm = $this->search . '%';
        return view('livewire.serviceperson.servicepeople-component',[
            'servicepeople' => Serviceperson::query()
                ->select('number', 'first_name', 'middle_name','last_name', 'serviceperson_status_id',
                    'created_at', 'formation_id', 'rank_id', 'job_id', 'unit_id')
                ->with(['formation','unit.company.battalion', 'rank', 'job.title','phoneNumbers:number',
                    'emailAddresses:email', 'lastEnlistment','status', 'photo'])
                ->orderBy('created_at', 'desc')
                ->where(function ($query) use ($searchTerm){
                    $query->where('last_name', 'like', $searchTerm)
                        ->orWhere('first_name', 'like', $searchTerm)
                        ->orWhere('number', 'like', $searchTerm);
                })
                ->when($this->filterRank, function ($query){
                    $query->where('rank_id', $this->filterRank);
                })
//                ->when($this->filterUnit, function ($query){
//                    $query->where('unit_id', $this->filterUnit);
//                })
                ->paginate(5)
        ]);
    }
}
