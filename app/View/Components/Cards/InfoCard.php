<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class InfoCard extends Component
{

    public $counter;
    public $title;

    /**
     * Create a new component instance.
     *

     * @param $counter
     * @param $title
     */
    public function __construct($counter, $title)
    {

//        $this->icon = $icon;
        $this->counter = $counter;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.info-card');
    }
}
