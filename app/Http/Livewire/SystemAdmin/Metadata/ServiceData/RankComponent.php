<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class RankComponent extends Component
{
    use WithPagination, WithAlerts, WithModal;


    public $search = '';
    public $grade, $regiment, $regimentSlug, $coastGuard, $coastGuardSlug, $airGuard, $airGuardSlug, $selectedId;
    public $title = 'Rank';

    protected $listeners = [ 'destroyRank'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.system-admin.metadata.service-data.rank-component',[
            'data' =>  Rank::query()
                ->orderBy('created_at', 'desc')
                ->where('grade', 'like', $searchTerm)
                ->orWhere('regiment', 'like', $searchTerm)
                ->orWhere('regiment_slug', 'like', $searchTerm)
                ->orWhere('coast_guard', 'like', $searchTerm)
                ->orWhere('coast_guard_slug', 'like', $searchTerm)
                ->orWhere('air_guard', 'like', $searchTerm)
                ->orWhere('air_guard_slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    private function resetInput()
    {

        $this->reset([
            'grade',
            'regiment',
            'regimentSlug',
            'coastGuard',
            'coastGuardSlug',
            'airGuard',
            'airGuardSlug',
            'selectedId',
        ]);
    }

    public function rankValidation($column)
    {
        return [
            'required',
            Rule::unique('ranks', $column)
                ->ignore($this->selectedId)
        ];
    }
    public function store()
    {
        $this->validate([
            'grade' => $this->rankValidation('grade'),
            'regiment' => $this->rankValidation('regiment'),
            'regimentSlug' => $this->rankValidation('regiment_slug'),
            'coastGuard' => $this->rankValidation('coast_guard'),
            'coastGuardSlug' => $this->rankValidation('coast_guard_slug'),
            'airGuard' => $this->rankValidation('air_guard'),
            'airGuardSlug' => $this->rankValidation('air_guard_slug'),
        ],[
            'grade.required' => 'Rank grade is required',
            'regiment.required' => 'Regiment grade equivalent is required',
            'regimentSlug.required' => 'Regiment rank abbreviation is required',
            'coastGuard.required' => 'Coast Guard grade equivalent is required',
            'coastGuardSlug.required' => 'Coast Guard rank abbreviation is required',
            'airGuard.required' => 'Air Guard grade equivalent is required',
            'airGuardSlug.required' => 'Air Guard rank abbreviation is required',
        ]);


        Rank::updateOrCreate([
            'grade' => $this->grade,
            'regiment' => $this->regiment,
            'regiment_slug' => $this->regimentSlug,
            'coast_guard' => $this->coastGuard,
            'coast_guard_slug' => $this->coastGuardSlug,
            'air_guard' => $this->airGuard,
            'air_guard_slug' => $this->airGuardSlug,
        ]);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();
    }

    public function edit($id)
    {
        $record = Rank::findOrFail($id);
        $this->selectedId = $id;

        $this->grade = $record->grade;
        $this->regiment = $record->regiment;
        $this->regimentSlug = $record->regiment_slug;
        $this->coastGuard = $record->coast_guard;
        $this->coastGuardSlug = $record->coast_guard_slug;
        $this->airGuard = $record->air_guard;
        $this->airGuardSlug = $record->air_guard_slug;

        $this->openModal();
    }

    public function destroyRank($id)
    {
        if ($id) {
            $record = Rank::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }


}
