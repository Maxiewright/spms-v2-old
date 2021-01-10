<?php


namespace Modules\Leave\Http\Livewire\Entitlement;


use Livewire\Component;
use Modules\Leave\Entities\LeaveEntitlement;
use Modules\Leave\Entities\LeaveGroupEntitlement;

class CreateEntitlement extends Component
{

    public LeaveEntitlement $leave_entitlement;
    public $leaveGroups;
    protected array $rules = [
        'leave_entitlement.serviceperson_number' => 'required',
        'leave_entitlement.leave_group_entitlement_id' => 'required|integer',
        'leave_entitlement.year' => 'required|digits:4'
    ];

    public function mount()
    {
        $this->leaveGroups = LeaveGroupEntitlement::all();
        $this->leave_entitlement = new LeaveEntitlement();
    }

    public function render()
    {
        return view('leave::livewire.entitlement.create');
    }

    public function updatedLeaveEntitlementYear()
    {
        $this->validateOnly('leave_entitlement.year');
    }
}
