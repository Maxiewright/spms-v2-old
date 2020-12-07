<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class MultiStepNav extends Component
{
    public $thisStep;
    public $title;
    public $step;

    /**
     * Create a new component instance.
     *
     * @param $thisStep
     * @param $title
     * @param $step
     */
    public function __construct($thisStep, $title, $step)
    {
        $this->thisStep = $thisStep;
        $this->title = $title;
        $this->step = $step;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.multi-step-nav');
    }
}
