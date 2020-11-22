<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class SideMenuTabs extends Component
{
    public $subHead;
    public $title;

    /**
     * Create a new component instance.
     *
     * @param $subHead
     * @param $title
     */
    public function __construct($subHead, $title)
    {
        $this->subHead = $subHead;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.layouts.side-menu-tabs');
    }
}
