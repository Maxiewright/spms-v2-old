<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\ServiceData;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Livewire\Component;
use Livewire\WithPagination;

class RankComponent extends Component
{
    use WithPagination;


    public $search = '';
    public $grade, $regiment, $regimentSlug, $coastGuard, $coastGuardSlug, $airGuard, $airGuardSlug, $selectedId;
    public $updateMode = false;
    public $title = 'Rank';

    protected $listeners = ['rank' => 'destroy'];

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
    private function resetInput()
    {
        $this->grade = null;
        $this->regiment = null;
        $this->regimentSlug = null;
        $this->coastGuard = null;
        $this->coastGuardSlug = null;
        $this->airGuard = null;
        $this->airGuardSlug = null;
    }
    public function store()
    {
        $this->validate([
            'grade' => 'required|unique:ranks,grade',
            'regiment' => 'required|unique:ranks,regiment',
            'regimentSlug' => 'required|unique:ranks,regiment_slug',
            'coastGuard' => 'required|unique:ranks,coast_guard',
            'coastGuardSlug' => 'required|unique:ranks,coast_guard_slug',
            'airGuard' => 'required|unique:ranks,air_guard',
            'airGuardSlug' => 'required|unique:ranks,air_guard_slug',
        ],[
            'grade.required' => 'Rank grade is required',
            'regiment.required' => 'Regiment grade equivalent is required',
            'regimentSlug.required' => 'Regiment short rank is required',
            'coastGuard.required' => 'Coast Guard grade equivalent is required',
            'coastGuardSlug.required' => 'Coast Guard short rank equivalent is required',
            'airGuard.required' => 'Air Guard grade equivalent is required',
            'airGuardSlug.required' => 'Air Guard short rank equivalent is required',
        ]);

        Rank::create([
            'grade' => $this->grade,
            'regiment' => $this->regiment,
            'regiment_slug' => $this->regimentSlug,
            'coast_guard' => $this->coastGuard,
            'coast_guard_slug' => $this->coastGuardSlug,
            'air_guard' => $this->airGuard,
            'air_guard_slug' => $this->airGuardSlug,
        ]);

        $this->resetInput();
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

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'grade' => 'required',
            'regiment' => 'required',
            'regimentSlug' => 'required',
            'coastGuard' => 'required',
            'coastGuardSlug' => 'required',
            'airGuard' => 'required',
            'airGuardSlug' => 'required',
        ],[
            'grade.required' => 'Rank grade is required',
            'regiment.required' => 'Regiment grade equivalent is required',
            'regimentSlug.required' => 'Regiment short rank is required',
            'coastGuard.required' => 'Coast Guard grade equivalent is required',
            'coastGuardSlug.required' => 'Coast Guard short rank equivalent is required',
            'airGuard.required' => 'Air Guard grade equivalent is required',
            'airGuardSlug.required' => 'Air Guard short rank equivalent is required',
        ]);

        if ($this->selectedId) {
            $record = Rank::find($this->selectedId);
            $record->update([
                'grade' => $this->grade,
                'regiment' => $this->regiment,
                'regiment_slug' => $this->regimentSlug,
                'coast_guard' => $this->coastGuard,
                'coast_guard_slug' => $this->coastGuardSlug,
                'air_guard' => $this->airGuard,
                'air_guard_slug' => $this->airGuardSlug,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Rank::where('id', $id);
            $record->delete();
        }
    }


}
