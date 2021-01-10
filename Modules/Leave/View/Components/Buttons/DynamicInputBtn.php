<?php

namespace Modules\Leave\View\Components\Buttons;

use Illuminate\View\Component;

class DynamicInputBtn extends Component
{
    public $btnType;
    public $title;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param $btnType
     * @param $title
     * @param $icon
     */
    public function __construct($btnType, $title, $icon)
    {

        $this->btnType = $btnType;
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.buttons.dynamic-input-btn');
    }
}
