<?php


namespace Modules\Leave\View\Components;


use Illuminate\View\Component;
use Illuminate\View\View;

class DataTable extends Component
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
     * @return View|string
     */
    public function render()
    {
        return view('leave::components.data-table');
    }
}
