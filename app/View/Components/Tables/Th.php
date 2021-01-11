<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Th extends Component
{

    /**
     * Create a new component instance.
     *
     * @param
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.th');
    }
}
