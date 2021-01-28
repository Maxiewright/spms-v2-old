<?php

namespace App\Http\Livewire\Layout;

use Livewire\Component;

class SideTabsLayout extends Component
{
    public $title;
    public $component;
    public $layout;



    public function render()
    {
        return view('livewire.layout.side-tabs-layout')
            ->extends('layout.master')
            ->section('body');

    }
}
