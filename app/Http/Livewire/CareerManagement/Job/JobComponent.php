<?php

namespace App\Http\Livewire\CareerManagement\Job;


use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use App\Models\System\Serviceperson\CareerManagement\Job\JobClass;
use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Livewire\Component;
use Livewire\WithPagination;

class JobComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filterClass, $filterCareerPath, $filterTitle, $filterRank;
    public $jobTitleId, $classId, $rankId, $careerPathId,$establishment, $description, $selectedId;
    public $jobTitles, $classes, $ranks, $careerPaths;
    public $updateMode = false;
    public $title = 'Job';

    protected $listeners = ['job' => 'destroy'];

    public function mount()
    {
        $this->jobTitles = JobTitle::all('id', 'name');
        $this->classes = JobClass::all('id', 'name');
        $this->careerPaths = CareerPath::all('id', 'name');
        $this->ranks = Rank::all('id', 'regiment_slug');
    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.career-management.job.job-component',[
            'data' =>  Job::query()
                ->orderBy('created_at', 'desc')
                ->whereHas('title', function ($q) use($searchTerm){
                    $q->where('name', 'like', $searchTerm);
                })->with('title')
                ->orWhereHas('class', function ($q) use($searchTerm){
                    $q->where('name', 'like', $searchTerm);
                })->with('class')
                ->orWhereHas('careerPath', function ($q) use($searchTerm){
                    $q->where('name', 'like', $searchTerm);
                })->with('careerPath')
                ->orWhereHas('rank', function ($q) use($searchTerm){
                    $q->where('regiment', 'like', $searchTerm);
                    $q->orwhere('regiment_slug', 'like', $searchTerm);
                })->with('rank')
                ->when($this->filterTitle, function ($query){
                    $query->where('job_title_id', '=', $this->filterTitle);
                })
                ->when($this->filterClass, function ($query){
                    $query->where('job_class_id', '=', $this->filterClass);
                })
                ->when($this->filterRank, function ($query){
                    $query->where('rank_id', '=', $this->filterRank);
                })
                ->when($this->filterCareerPath, function ($query){
                    $query->where('career_path_id', '=', $this->filterCareerPath);
                })->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->jobTitleId = null;
        $this->classId = null;
        $this->rankId = null;
        $this->careerPathId = null;
        $this->establishment  = null;
        $this->description = null;
    }


    public function updated($establishment)
    {
        $this->validateOnly($establishment,
            ['establishment' => 'required|numeric']
        );
    }

    public function store()
    {
        $this->validate([
            'jobTitleId' => 'required',
//            'classId' => 'required',
            'rankId' => 'required',
            'careerPathId' => 'required',
            'establishment' => 'required|numeric',
            'description' => 'sometimes',
        ],[
            'jobTitleId.required' => 'A title is required',
//            'classId.required' => 'class is required',
            'rankId.required' => 'A rank is required',
            'careerPathId.required' => 'Career Path is required',
            'establishment.required' => 'Establishment is required',
        ]);

        Job::create([
            'job_title_id' => $this->jobTitleId,
            'job_class_id' => $this->classId,
            'rank_id' => $this->rankId,
            'career_path_id' => $this->careerPathId,
            'establishment' => $this->establishment ,
            'description' => $this->description,
        ]);

        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Job::findOrFail($id);

        $this->selectedId = $id;
        $this->jobTitleId = $record->job_title_id ;
        $this->classId = $record->job_class_id ;
        $this->rankId = $record->rank_id ;
        $this->careerPathId = $record->career_path_id ;
        $this->establishment  = $record->establishment ;
        $this->description = $record->description ;

        $this->updateMode = true;
    }

    public function update()
    {

        $this->validate([
            'selectedId' => 'required|numeric',
            'jobTitleId' => 'required',
//            'classId' => 'required',
            'rankId' => 'required',
            'careerPathId' => 'required',
            'establishment' => 'required',
            'description' => 'sometimes',
        ],[
            'jobTitleId.required' => 'A title is required',
//            'classId.required' => 'class is required',
            'rankId.required' => 'A rank is required',
            'careerPathId.required' => 'Career Path is required',
            'establishment.required' => 'Establishment is required',
        ]);

        if ($this->selectedId) {
            $record = Job::find($this->selectedId);
            $record->update([
                'job_title_id' => $this->jobTitleId,
                'job_class_id' => $this->classId,
                'rank_id' => $this->rankId,
                'career_path_id' => $this->careerPathId,
                'establishment' => $this->establishment ,
                'description' => $this->description,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Job::where('id', $id);
            $record->delete();
        }
    }
}
