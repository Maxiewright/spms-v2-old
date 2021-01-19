<?php

namespace App\View\Components\Link;

use Illuminate\View\Component;

class XlButton extends Component
{
    public $route;
    public $icon;
    public $title;

    /**
     * Create a new component instance.
     *
     * @param $route
     * @param $icon
     * @param $title
     */
    public function __construct($route, $icon, $title)
    {

        $this->route = $route;
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
        return view('components.link.xl-button');
    }
}
