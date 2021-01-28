<?php

namespace App\Http\Livewire\Manpower\Job;

use Livewire\Component;

class JobViewComponent extends Component
{
    public string $menuItem = 'job';

    public function setMenuItem($menuItem)
    {
        $this->menuItem = $menuItem;
    }

    public function render()
    {
        return view('livewire.manpower.job.job-view-component')
            ->extends('manpower.career_management.jobs')
            ->section('subContent');
    }
}
