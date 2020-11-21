<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class AuthLayout extends Component
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
        return view('components.layouts.auth-layout');
    }
}
