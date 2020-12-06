<?php


namespace App\Http\Livewire\Traits;


trait WithDynamicInput
{
    public $inputs = [];

    /**
     * Adds input
     */
    public function add()
    {
        $this->validate();
        $this->inputs[] = count($this->inputs) + 1;
    }

    /**
     * Removes field form DOM and unsets any data passed to global data array
     *
     * @param $index
     */
    public function remove($index)
    {
        $this->emit('removeData', $this->dimension, $index);
        unset($this->data[$this->dimension][$index + 1]);
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }



}
