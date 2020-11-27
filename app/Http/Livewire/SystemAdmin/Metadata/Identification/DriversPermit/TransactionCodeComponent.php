<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\Identification\DriversPermit;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionCodeComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;


    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Transaction Code';

    protected $listeners = ['destroyTransactionCode'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.identification.drivers-permit.transaction-code-component',[
            'data' =>  DriversPermitTransactionCode::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    /**
     * Show the create form
     */
    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset(['name', 'slug', 'selectedId']);
    }
    public function store()
    {
        $this->validate([
            'name' => [
                'required',
                Rule::unique('drivers_permit_transaction_codes' )
                    ->ignore($this->selectedId)
            ],

            'slug' => [
                'required',
                Rule::unique('drivers_permit_transaction_codes' )
                    ->ignore($this->selectedId)
            ],
        ],[
            'name.required' => 'Enlistment type is required',
            'slug.required' => 'Short Name is required',
            'slug.unique' => 'Short Name already in use'
        ]);

        DriversPermitTransactionCode::updateOrCreate(['id' => $this->selectedId],[
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = DriversPermitTransactionCode::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;

        $this->openModal();
    }


    public function destroyTransactionCode($id)
    {
        if ($id) {
            $record = DriversPermitTransactionCode::where('id', $id);
            $record->delete();
        }
    }

}
