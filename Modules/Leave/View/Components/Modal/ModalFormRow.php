<?php


namespace Modules\Leave\View\Components\Modal;


use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalFormRow extends Component
{
    public $id;
    public $label;

    /**
     * ModalInputRow constructor.
     * @param $id
     * @param $label
     */
    public function __construct($id, $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return View|Htmlable|\Closure|string
     */
    public function render()
    {
        return view('leave::components.modal.modal-form-row');
    }
}
