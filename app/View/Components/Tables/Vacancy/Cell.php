<?php

namespace App\View\Components\Tables\Vacancy;

use Illuminate\View\Component;

class Cell extends Component
{
    private $establishment;
    private $strength;

    /**
     * Create a new component instance.
     *
     * @param $establishment
     * @param $strength
     */
    public function __construct($establishment, $strength)
    {
        $this->establishment = $establishment;
        $this->strength = $strength;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.vacancy.cell');
    }
}
