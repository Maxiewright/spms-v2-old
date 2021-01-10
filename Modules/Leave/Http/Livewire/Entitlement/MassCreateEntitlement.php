<?php


namespace Modules\Leave\Http\Livewire\Entitlement;


use App\Models\Serviceperson\Serviceperson;
use Livewire\Component;
use Modules\Leave\Entities\LeaveEntitlement;
use Modules\Leave\Entities\LeaveGroupEntitlement;

class MassCreateEntitlement extends Component
{
    public $search = '';
    public $selectedServicepersonNumber = null;
    public $serviceperson;
    public $leaveGroupEntitlement, $leaveGroupEntitlements;
    public $year;
    public $inputs = [];
    public $i = 1;

    public function mount()
    {
        $this->leaveGroupEntitlements = LeaveGroupEntitlement::all();
    }


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        if ($this->selectedServicepersonNumber) $this->search = '';

        return view('leave::livewire.entitlement.mass-create-entitlement',[
            'servicepeople' =>  $servicepeople = $this->search
                ? Serviceperson::query()
                    ->where('number', 'LIKE', '%'. $this->search . '%')
                    ->orWhere('first_name', 'LIKE', '%'. $this->search . '%')
                    ->orWhere('middle_name', 'LIKE', '%'. $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%'. $this->search . '%')
                    ->get()
                : [],

            'noResults' => $this->search && $servicepeople->isEmpty(),

            'selectedServiceperson' => Serviceperson::find($this->selectedServicepersonNumber)
        ] );
    }

    public function resetInput()
    {
        $this->serviceperson = '';
        $this->leaveGroupEntitlement = '';
        $this->year = '';
    }


    public function store()
    {

        $validateData = $this->validate([
            'serviceperson.*' => 'required',
            'leaveGroupEntitlement.*' => 'required',
            'year.*' => 'required|digits:4'
        ],
            [
                'serviceperson.*.required' => 'A serviceperson is required',
                'leaveGroupEntitlement.*.required' => 'Leave Entitlement Group is require',
                'year.*.required:4' => 'A year is require',
                'year.*.digits' => 'The year must be four digits',
            ]

        );

        foreach ($this->serviceperson as $key => $value){
            LeaveEntitlement::create([
               'serviceperson_number' => $this->serviceperson[$key],
               'leave_group_entitlement_id' => $this->leaveGroupEntitlement[$key],
               'year' => $this->year
            ]);
        }

        $this->inputs = [];

        $this->resetInput();

        return redirect()->back();
    }


}
