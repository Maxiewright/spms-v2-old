<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class LivewireCheckBox extends Component
{
    public $label;
    public $model;

    /**
     * Create a new component instance.
     *
     * @param $label
     * @param $model
     */
    public function __construct($label, $model)
    {
        $this->label = $label;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input.livewire-check-box');
    }
}
