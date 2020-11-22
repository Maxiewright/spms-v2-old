<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;

    /**
     * Create a new component instance.
     *
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.layout.page-header');
    }
}
