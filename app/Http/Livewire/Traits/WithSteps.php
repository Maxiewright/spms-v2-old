<?php


namespace App\Http\Livewire\Traits;


trait WithSteps
{
    public $step;

    public function mount()
    {
        $this->step = 2;
    }

    public function increaseStep()
    {
        $this->step++;
    }

    public function decreaseStep()
    {
        $this->step--;
    }

    public function submit()
    {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }
}
