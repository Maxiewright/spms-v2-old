<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class SelectPrepend extends Component
{
    public $selectModel;
    public $selectPlaceholder;
    public $textModel;
    public $textPlaceholder;

    /**
     * Create a new component instance.
     *
     * @param $selectModel
     * @param $selectPlaceholder
     * @param $textModel
     * @param $textPlaceholder
     */
    public function __construct($selectModel, $selectPlaceholder, $textModel, $textPlaceholder)
    {
        $this->selectModel = $selectModel;
        $this->selectPlaceholder = $selectPlaceholder;
        $this->textModel = $textModel;
        $this->textPlaceholder = $textPlaceholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input.select-prepend');
    }
}
