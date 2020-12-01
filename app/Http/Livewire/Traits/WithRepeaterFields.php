<?php


namespace App\Http\Livewire\Traits;


class WithRepeaterFields
{
    public $i;

    public function add($i, $input)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($input ,$i);
    }

    public function remove($i, $input)
    {
        unset($input[$i]);
    }
}
