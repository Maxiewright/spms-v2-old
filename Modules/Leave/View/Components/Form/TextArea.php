<?php


namespace Modules\Leave\View\Components\Form;


use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $model;
    public $row;

    /**
     * ModalInputRow constructor.
     * @param $model
     * @param $row
     */
    public function __construct($model, $row)
    {
        $this->model = $model;
        $this->row = $row;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return View|Htmlable|Closure|string
     */
    public function render()
    {
        return view('leave::components.form.textarea');
    }
}
