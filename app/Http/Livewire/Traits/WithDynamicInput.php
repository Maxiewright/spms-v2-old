<?php


namespace App\Http\Livewire\Traits;


trait WithDynamicInput
{
    public $inputs = [];

    public function add()
    {
        $this->inputs[] = count($this->inputs) + 1;
    }

    public function remove($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }



}
