<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class AuthInput extends Component
{
    public $name;
    public $placeholder;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param $name
     * @param $placeholder

     */
    public function __construct($type, $name, $placeholder)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input.auth-input');
    }
}
