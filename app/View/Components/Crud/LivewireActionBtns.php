<?php

namespace App\View\Components\Crud;

use Illuminate\View\Component;

class LivewireActionBtns extends Component
{
    public $id;

    /**
     * Create a new component instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.crud.livewire-action-btns');
    }
}
