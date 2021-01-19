<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LivewireDoubleIdActionBtns extends Component
{
    public $id;
    public $id2;

    /**
     * Create a new component instance.
     *
     * @param $id
     * @param $id2
     */
    public function __construct($id, $id2)
    {
        $this->id = $id;
        $this->id2 = $id2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.livewire-double-id-action-btns');
    }
}
