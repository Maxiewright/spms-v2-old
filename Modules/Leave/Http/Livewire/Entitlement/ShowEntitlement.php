<?php


namespace Modules\Leave\Http\Livewire\Entitlement;


use App\Models\Serviceperson\Serviceperson;
use Livewire\Component;
use Modules\Leave\Entities\LeaveEntitlement;
use Modules\Leave\Entities\LeaveGroup;
use Modules\Leave\Entities\LeaveType;


class ShowEntitlement extends Component
{
   public $query;
   public $leaveGroupEntitlements, $leaveGroupEntitlementId;
   public $year;
   public $servicepeople;
   public $title;
   public $types;
   public $serviceperson;

    public function mount(Serviceperson $serviceperson)
    {
        $this->types = LeaveType::all('id', 'name');
        $this->leaveGroupEntitlements = LeaveGroup::all('id', 'name');
        $this->serviceperson = $serviceperson;
    }


    public function render()
    {
        return view('leave::livewire.entitlement.show', [
            'entitlements' => $this->serviceperson->leaveEntitlements()
                ->orderBy('year', 'desc')
                ->paginate(10)
        ])->extends('layout.master')
            ->section(['title' => 'Entitlement'])
            ->section('content');

    }


}
