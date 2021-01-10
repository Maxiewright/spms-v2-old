<?php


namespace Modules\Events\Http\Livewire;


use Livewire\Component;
use Modules\Events\Entities\Event;

class LoginEvents extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::all();
    }

    public function render()
    {
        return view('events::livewire.login-events');
    }
}
