<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class LivewireSelect extends Component
{
    public $model;
    public $placeholder;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param $model
     * @param $placeholder
     * @param $label
     */
    public function __construct($model, $placeholder, $label)
    {
        $this->model = $model;
        $this->placeholder = $placeholder;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input.livewire-select');
    }
}
