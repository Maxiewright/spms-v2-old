<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class MultiStep extends Component
{
    public $title;
    public $step;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $step
     */
    public function __construct($title, $step)
    {
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
        return view('components.form.multi-step');
    }
}
