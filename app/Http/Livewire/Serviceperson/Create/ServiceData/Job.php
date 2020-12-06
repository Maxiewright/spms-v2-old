<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Specialty;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Livewire\Component;

class Job extends Component
{
    use WithSteps;

    public $branches ;
    public $streams = [];
    public $careerPaths = [];
    public $specialities = [];
    public $jobs = [];

    protected $rules = [

    ];

    protected  $messages = [

    ];

    protected $listeners = ['validateJob'];

    public function validateJob()
    {
        $this->validate();

        $this->emit('validate...');
    }

    public function mount()
    {
        $this->branches = Branch::all('id','name');
    }

    public function render()
    {
        if (isset($this->data['job']['branch'])){
            $this->streams = Stream::where('branch_id', $this->data['job']['branch'])->get();
        }

        if (isset($this->data['job']['stream'])){
            $this->careerPaths = CareerPath::where('stream_id',$this->data['job']['stream'])->get();
        }

        if (isset($this->data['job']['career_path'])){
            $this->specialities = Specialty::where('career_path_id', $this->data['job']['career_path'])->get();
            $this->jobs = \App\Models\System\Serviceperson\CareerManagement\Job\Job::
            join('job_titles', 'job_title_id','=', 'job_titles.id')
                ->select('name', 'slug', 'jobs.id')
                ->where('career_path_id', $this->data['job']['career_path'])->get();
        }

        return view('livewire.serviceperson.create.service-data.job');
    }
}
