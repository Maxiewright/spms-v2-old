<?php

namespace App\View\Components\Link;

use Illuminate\View\Component;

class Tab extends Component
{
    public $target;
    public $icon;
    public $title;

    /**
     * Create a new component instance.
     *
     * @param $target
     * @param $icon
     * @param $title
     */
    public function __construct($target, $icon, $title)
    {
        $this->target = $target;
        $this->icon = $icon;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.link.tab');
    }
}
