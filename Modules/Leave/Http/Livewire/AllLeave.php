<?php


namespace Modules\Leave\Http\Livewire;


use App\Models\Serviceperson\Serviceperson;
use Livewire\Component;

class AllLeave extends Component
{
    public $title;



    public function render()
    {
        return view('leave::livewire.all-leave', [
            'servicepeople' => Serviceperson::with('leave', 'leaveEntitlements')

            ->paginate(10)
        ]);
    }
}
