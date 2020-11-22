<?php

namespace App\View\Components\Tables\Responsive;

use Illuminate\View\Component;

class Th extends Component
{
    public $details;

    /**
     * Create a new component instance.
     *
     * @param $details
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.responsive.th');
    }
}
