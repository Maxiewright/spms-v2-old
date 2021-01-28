<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $title;
    public $link;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $link
     */
    public function __construct($title, $link)
    {
        $this->title = $title;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.data-table');
    }
}
