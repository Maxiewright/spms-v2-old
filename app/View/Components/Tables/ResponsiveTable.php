<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class ResponsiveTable extends Component
{
    public $title;
    public $options;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $options
     */
    public function __construct($title, $options)
    {
        $this->title = $title;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.responsive-table');
    }
}
