<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class MultiStep extends Component
{
    public $title;
    public $previousStep;
    public $step;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $previousStep
     * @param $step
     */
    public function __construct($title, $previousStep, $step)
    {
        $this->title = $title;
        $this->previousStep = $previousStep;
        $this->step = $step;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.multi-step');
    }
}
