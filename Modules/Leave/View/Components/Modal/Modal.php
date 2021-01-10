<?php


namespace Modules\Leave\View\Components\Modal;


use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends  Component
{
    public $id;
    public $title;

    /**
     * Modal constructor.
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {

        $this->id = $id;
        $this->title = $title;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return View|Htmlable|Closure|string
     */
    public function render()
    {
        return view('leave::components.modal.modal');
    }
}
