<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class LivewireTextarea extends Component
{
    public $model;
    public $label;
    public $cols;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @param $model
     * @param $label
     * @param $cols
     * @param $rows
     */
    public function __construct($model, $label,$cols, $rows)
    {
        //
        $this->model = $model;
        $this->label = $label;
        $this->cols = $cols;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input.livewire-textarea');
    }
}
