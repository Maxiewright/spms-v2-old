<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Specialty;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use Livewire\Component;

class Job extends Component
{
    use WithSteps, WithDynamicInput;

    public $branches;
    public $streams = [];
    public $careerPaths = [];
    public $specialities = [];
    public $jobs = [];
    public $title = 'serviceperson_job';

    protected $rules = [
        'data.serviceperson_job.0.branch_id' => 'nullable',
        'data.serviceperson_job.0.career_path_id' => 'nullable',
        'data.serviceperson_job.0.job_id' => 'required',
        'data.serviceperson_job.0.speciality_id' => 'nullable',
        'data.serviceperson_job.0.started_on' => 'required|date|before_or_equal:today',
        'data.serviceperson_job.0.ended_on' => 'nullable|date|after:joined_on',
    ];

    protected $messages = [
        'data.serviceperson_job.*.job_id.required' => 'Job is required',
        'data.serviceperson_job.*.started_on.required' => 'Date started is required',
        'data.serviceperson_job.*.started_on.before_or_equal' => 'Date started cannot be after today',
        'data.serviceperson_job.*.ended_on.after' => 'Date left cannot be before date joined',
    ];

    protected $listeners = ['validateJob'];

    public function validateJob()
    {
        $this->validate();

        $this->emit('componentsValidated');
    }

    public function mount()
    {
        $this->branches = Branch::all('id', 'name');

        $this->inputs[] = 1;
    }

    public function render()
    {
        if (isset($this->data['serviceperson_job'][0]['branch_id'])) {
            $this->streams = Stream::query()
                ->where('branch_id', $this->data['serviceperson_job'][0]['branch_id'])
                ->get();
        }

        if (isset($this->data['serviceperson_job'][0]['stream_id'])) {
            $this->careerPaths = CareerPath::query()
                ->where('stream_id', $this->data['serviceperson_job'][0]['stream_id'])
                ->get();
        }

        if (isset($this->data['serviceperson_job'][0]['career_path_id'])) {
            $this->specialities = Specialty::query()
            ->where('career_path_id', $this->data['serviceperson_job'][0]['career_path_id'])->get();
            $this->jobs = \App\Models\System\Serviceperson\CareerManagement\Job\Job::
            join('job_titles', 'job_title_id', '=', 'job_titles.id')
                ->select('name', 'slug', 'jobs.id')
                ->where('career_path_id', $this->data['serviceperson_job'][0]['career_path_id'])->get();
        }

        return view('livewire.serviceperson.create.service-data.job');
    }
}
