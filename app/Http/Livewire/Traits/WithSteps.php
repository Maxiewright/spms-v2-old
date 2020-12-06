<?php


namespace App\Http\Livewire\Traits;


trait WithSteps
{
    public $data = [];

    /**
     * Merges to overall data array
     */
    public function updatedData()
    {
        $this->emit('mergeData', $this->data);
    }

    /**
     * validated the step and proceeds to the next
     */
    public function submit()
    {
        $this->validate();
        $this->emit('goToStep', $this->nextStep);
    }

    public function componentsValidated()
    {
        $this->emit('goToStep', $this->nextStep);
    }

}
