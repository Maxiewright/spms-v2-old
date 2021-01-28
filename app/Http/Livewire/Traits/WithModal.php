<?php


namespace App\Http\Livewire\Traits;


trait WithModal
{
    public $isOpen  = false;

    /**
     * Open the modal
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * Close the modal
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * Show the create form
     */
    public function create()
    {
        $this->selectedId = null;

        $this->resetInput();

        $this->openModal();
    }
}
