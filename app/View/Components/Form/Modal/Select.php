<?php

namespace App\View\Components\Form\Modal;

use Illuminate\View\Component;

class Select extends Component
{
    public $model;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param $model
     * @param $label
     */
    public function __construct($model, $label)
    {
        $this->model = $model;
        $this->label = $label;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.modal.select');
    }
}
