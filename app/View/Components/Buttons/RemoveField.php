<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class RemoveField extends Component
{
    public $field;

    /**
     * Create a new component instance.
     *
     * @param $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.remove-field');
    }
}
