<?php


namespace Modules\Leave\View\Components;



use Illuminate\View\Component;
use Illuminate\View\View;

class DynamicSelect extends Component
{
    public $option;
    public $action;

    /**
     * Create a new component instance.
     *
     * @param $option
     * @param $action
     */
    public function __construct($option, $action)
    {
        $this->option = $option;
        $this->action = $action;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('leave::components.dynamic-select');
    }
}
