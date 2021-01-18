<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ContentCard extends Component
{
    public $title;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $id
     */
    public function __construct($title, $id)
    {
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.content-card');
    }
}
