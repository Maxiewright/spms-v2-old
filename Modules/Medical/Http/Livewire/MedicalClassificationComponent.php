<?php

namespace Modules\Medical\Http\Livewire;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Medical\Entities\MedicalClassification;
use Modules\Medical\Entities\MedicalClassificationGrade;

class MedicalClassificationComponent extends Component
{
    use WithPagination, WithModal, WithAlerts;

    public $search = '';
    public $filterRank;
    public $selectedId;

    public $serviceperson_number, $physical_capacity, $upper_limbs, $locomotion, $hearing_left, $hearing_right,
        $eyesight_left, $eyesight_right, $mental_capacity, $stability, $performed_on, $performed_at, $medical_officer,
        $medical_officer_remarks, $grades;

    public $title = 'Medical Classification';

    protected $listeners = ['destroyMedicalClassification'];

    protected $rules = [
        'serviceperson_number' => 'required|numeric',
        'physical_capacity' => 'required',
        'upper_limbs' => 'required',
        'locomotion' => 'required',
        'hearing_left' => 'required',
        'hearing_right' => 'required',
        'eyesight_left' => 'required',
        'eyesight_right' => 'required',
        'mental_capacity' => 'required',
        'stability' => 'required',
        'performed_on' => 'required',
        'performed_at' => 'required',
        'medical_officer' => 'required|numeric',
        'medical_officer_remarks' => 'nullable'
    ];

    public function mount()
    {
        $this->grades = MedicalClassificationGrade::all('id', 'degree');
    }


    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        return view('medical::livewire.medical-classification-component', [
            'data' => MedicalClassification::query()
                ->orderBy('created_at', 'desc')
                ->whereHas('serviceperson', function ($q) use ($searchTerm) {
                    $q->where('number', 'like', $searchTerm);
                })->with('serviceperson')
                ->orWhereHas('medicalOfficer', function ($q) use ($searchTerm) {
                    $q->where('number', 'like', $searchTerm);
                })->with('serviceperson')
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->serviceperson_number = null;
        $this->medical_officer = null;
        $this->physical_capacity = null;
        $this->upper_limbs = null;
        $this->locomotion = null;
        $this->hearing_left = null;
        $this->hearing_right = null;
        $this->eyesight_left = null;
        $this->eyesight_right = null;
        $this->mental_capacity = null;
        $this->stability = null;
        $this->performed_on = null;
        $this->performed_at = null;
        $this->medical_officer_remarks = null;
    }

    public function store()
    {
        $validatedData = $this->validate();

        MedicalClassification::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = MedicalClassification::findOrFail($id);

        $this->selectedId = $id;
        $this->serviceperson_number = $record->serviceperson_number;
        $this->medical_officer = $record->medical_officer;
        $this->physical_capacity = $record->physical_capacity;
        $this->upper_limbs = $record->upper_limbs;
        $this->locomotion = $record->locomotion;
        $this->hearing_left = $record->hearing_left;
        $this->hearing_right = $record->hearing_right;
        $this->eyesight_left = $record->eyesight_left;
        $this->eyesight_right = $record->eyesight_right;
        $this->mental_capacity = $record->mental_capacity;
        $this->stability = $record->stability;
        $this->performed_on = $record->performed_on;
        $this->performed_at = $record->performed_at;
        $this->medical_officer_remarks = $record->medical_officer_remarks;

        $this->openModal();
    }

    public function destroyMedicalClassification($id)
    {
        if ($id) {
            $record = MedicalClassification::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
