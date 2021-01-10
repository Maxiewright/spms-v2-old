<?php


namespace Modules\Leave\View\Components\Form;


use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $model;
    public $title;
    public $type;

    /**
     * ModalInputRow constructor.
     * @param $model
     * @param $title
     * @param $type
     */
    public function __construct($model, $title, $type)
    {
        $this->model = $model;
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return View|Htmlable|\Closure|string
     */
    public function render()
    {
        return view('leave::components.form.input');
    }
}
