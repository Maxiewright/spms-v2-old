<?php

namespace App\View\Components\ApprovalSystem;

use Illuminate\View\Component;

class ApprovalSystemCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.approval-system.approval-system-card');
    }
}
