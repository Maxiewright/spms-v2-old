<?php

namespace App\View\Components\Link;

use Illuminate\View\Component;

class TableOfContent extends Component
{
    public $href;
    public $title;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param $href
     * @param $title
     * @param $icon
     */
    public function __construct($href, $title, $icon)
    {
        $this->href = $href;
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.link.table-of-content');
    }
}
