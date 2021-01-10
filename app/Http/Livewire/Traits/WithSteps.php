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

    /**
     * Proceeds to the next step after all component on a page is validated
     */
    public function componentsValidated()
    {
        $this->emit('goToStep', $this->nextStep);
    }

}
