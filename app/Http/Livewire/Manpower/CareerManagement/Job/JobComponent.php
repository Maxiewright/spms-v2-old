<?php

namespace App\Http\Livewire\Manpower\CareerManagement\Job;


use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithBulkActions;
use App\Http\Livewire\Traits\WithDataTable;
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
    use WithPagination, WithFileUploads, WithModal, WithAlerts, WithDataTable, WithBulkActions;

    public $job_title_id, $class_id, $rank_id, $career_path_id,$establishment, $job_description_path;
    public $selectedId;
    public $jobTitles, $classes, $ranks, $careerPaths;
    public $jobDescription;
    public $jobDescriptionText;

    public array $filters = [
        'search' => '',
        'class' => '',
        'careerPath' => '',
        'title' => '',
        'rank' => '',
    ];

    public $title = 'Job';

    protected $listeners = ['destroyJob'];

    protected $rules = [
        'job_title_id' => 'required',
//            'class_id' => 'required',
        'rank_id' => 'required',
        'career_path_id' => 'required',
        'establishment' => 'required|numeric',
        'jobDescription' => 'nullable|file|mimes:pdf,doc,docx',
        'job_description_path' => 'sometimes'
    ];

    protected $messages = [
        'job_title_id.required' => 'A title is required',
//            'class_id.required' => 'class is required',
        'rank_id.required' => 'A rank is required',
        'career_path_id.required' => 'Career Path is required',
        'establishment.required' => 'Establishment is required',
        'jobDescription.mimes' => 'The file must be a PDF or MS Word document'
    ];

    public function mount()
    {
        $this->jobTitles = JobTitle::all('id', 'name');
        $this->classes = JobClass::all('id', 'name');
        $this->careerPaths = CareerPath::all('id', 'name');
        $this->ranks = Rank::all('id', 'regiment_slug');
        $this->jobDescriptionText = 'Upload Job Description';
    }

    public function getRowsQueryProperty()
    {
        $query = Job::query()
            ->when($this->filters['title'], fn($query, $title) => $query->where('job_title_id', '=', $title))
            ->when($this->filters['rank'], fn($query, $rank) => $query->where('rank_id', '=', $rank))
            ->when($this->filters['class'], fn($query, $class) => $query->where('job_class_id', '=', $class))
            ->when($this->filters['careerPath'], fn($query, $careerPath) => $query->where('career_path_id', '=', $careerPath))
            ->whereHas('title', fn($query) => $query->where('name', 'like', '%'.$this->filters['search'].'%' ));

            return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(10);
    }

    public function render()
    {
        return view('livewire.manpower.career-management.job.job-component',[
            'data' =>  $this->rows,
        ]);
    }

    private function resetInput()
    {
        $this->job_title_id = null;
        $this->class_id = null;
        $this->rank_id = null;
        $this->career_path_id = null;
        $this->establishment  = null;
        $this->job_description_path = null;
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

        $fileName = $this->uploadJobDescription();

        $validatedData = $this->validate();


        Job::updateOrCreate(['id' => $this->selectedId],$validatedData, ['job_description_path' => $fileName]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Job::findOrFail($id);

        $this->selectedId = $id;

        $this->job_title_id = $record->job_title_id ;
        $this->class_id = $record->job_class_id ;
        $this->rank_id = $record->rank_id ;
        $this->career_path_id = $record->career_path_id ;
        $this->establishment  = $record->establishment ;
        $this->job_description_path = $record->job_description_path;

        if ($this->job_description_path != null){
            $this->jobDescriptionText = $record->job_description_path ;
        }else{
            $this->jobDescriptionText = $this->uploadJobDescription() ;
        }

        $this->openModal();
    }

    public function destroyJob($id)
    {
        if ($id) {

            $record = Job::where('id', $id);

            $record->delete();

            $this->showDeleteAlert();
        }
    }


    public function uploadJobDescription()
    {
        if ($this->jobDescription){

            $rank = preg_replace('/\s+/', '', Rank::where('id',$this->rank_id)
                ->get()->pluck('grade')->first()) ;

            $jobTitle = preg_replace('/\s+/', '', JobTitle::where('id',$this->job_title_id)
                ->get()->pluck('name')->first()) ;

            $filename = $rank.'-'.$jobTitle.'.'.$this->jobDescription->extension();

            $this->jobDescription->storeAs('public/job_descriptions', $filename);

            return $filename;
        }

    }



}
