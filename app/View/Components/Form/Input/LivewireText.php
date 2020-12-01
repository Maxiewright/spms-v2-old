<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class LivewireText extends Component
{
    public $model;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param $model
     * @param $placeholder
     */
    public function __construct($model, $placeholder)
    {
        $this->model = $model;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input.livewire-text');
    }
}
