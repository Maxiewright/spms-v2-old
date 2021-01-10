<?php


namespace Modules\Leave\View\Components\Form;


use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $option;
    public $action;
    public $model;

    /**
     * ModalInputRow constructor.
     * @param $model
     * @param $option
     * @param $action
     */
    public function __construct($model, $option, $action)
    {
        $this->option = $option;
        $this->action = $action;
        $this->model = $model;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return View|Htmlable|Closure|string
     */
    public function render()
    {
        return view('leave::components.form.select');
    }
}
