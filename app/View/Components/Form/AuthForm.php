<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class AuthForm extends Component
{
    public $action;
    public $submitBtn;

    /**
     * Create a new component instance.
     *
     * @param $action
     * @param $submitBtn
     *
     */
    public function __construct($action,$submitBtn)
    {
        $this->action = $action;
        $this->submitBtn = $submitBtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.auth-form');
    }
}
