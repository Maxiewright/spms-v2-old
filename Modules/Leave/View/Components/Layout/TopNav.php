<?php


namespace Modules\Leave\View\Components\Layout;


use Illuminate\View\Component;

class TopNav extends Component
{

    /**
     * @return string
     */
    public function render()
    {
        return view('leave::components.layout.top-nav');
    }
}
