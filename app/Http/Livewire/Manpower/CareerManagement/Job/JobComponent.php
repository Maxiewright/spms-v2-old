<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Job;


use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use App\Models\System\Serviceperson\CareerManagement\Job\JobClass;
use App\Models\System\Serviceperson\CareerManagement\Job\JobTitle;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class JobComponent extends Component
{
    use WithPagination, WithFileUploads, WithModal, WithAlerts;


    public $search = '';
    public $filterClass, $filterCareerPath, $filterTitle, $filterRank;
    public $jobTitleId, $classId, $rankId, $careerPathId,$establishment, $description, $selectedId;
    public $jobTitles, $classes, $ranks, $careerPaths;
    public $updateMode = false;
    public $jobDescription;
    public $jobDescriptionText;

    public $title = 'Job';

    protected $listeners = ['job' => 'destroy'];

    protected $rules = [
        'jobTitleId' => 'required',
//            'classId' => 'required',
        'rankId' => 'required',
        'careerPathId' => 'required',
        'establishment' => 'required|numeric',
        'jobDescription' => 'nullable|file|mimes:pdf,doc,docx',
    ];

    protected $messages = [
        'jobTitleId.required' => 'A title is required',
//            'classId.required' => 'class is required',
        'rankId.required' => 'A rank is required',
        'careerPathId.required' => 'Career Path is required',
        'establishment.required' => 'Establishment is required',
        'jobDescription.mimes' => 'The file must be a PDF or MS Word document'
    ];

    public function mount()
    {
        $this->jobTitles = JobTitle::all('id', 'name');
        $this->classes = JobClass::all('id', 'name');
        $this->careerPaths = CareerPath::all('id', 'name');
        $this->ranks = Rank::all('id', 'regiment_slug');
        $this->jobDescriptionText = 'Choose Job Description';
    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.manpower.career-management.job.job-component',[
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
        $this->jobDescriptionText = 'Upload Job Description';
    }


    public function updated($establishment, $jobDescription)
    {
        $this->validateOnly($establishment);
        $this->validateOnly($jobDescription);
    }

    public function getFilename()
    {
        return $this->jobDescription->getClientOriginalName();
    }

    public function store()
    {

        $validatedData = $this->validate();

        $this->uploadJobDescription();

        Job::updateOrCreate(['id' => $this->selectedId], $validatedData);


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

        if (!$this->jobDescription){
            $this->jobDescriptionText = $record->job_description_path ;
        }else{
            $this->jobDescriptionText = $this->uploadJobDescription() ;
        }

        $this->updateMode = true;
    }

    public function update()
    {

        $this->validate([
            'selected_id' => 'required|numeric',
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

    public function uploadJobDescription()
    {
        if ($this->jobDescription){

            $rank = preg_replace('/\s+/', '', Rank::where('id',$this->rankId)
                ->get()->pluck('grade')->first()) ;

            $jobTitle = preg_replace('/\s+/', '', JobTitle::where('id',$this->jobTitleId)
                ->get()->pluck('name')->first()) ;

            $filename = $rank.'-'.$jobTitle.'.'.$this->jobDescription->extension();

            $this->jobDescription->storeAs('public/job_descriptions', $filename);

            return $filename;
        }

    }
}
