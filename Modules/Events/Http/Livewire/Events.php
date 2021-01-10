<?php


namespace Modules\Events\Http\Livewire;


use App\Http\Livewire\Traits\WithModal;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Unit;
use App\Models\System\Serviceperson\Unit\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Events\Entities\Event;
use Modules\Events\Entities\EventStatus;
use Modules\Events\Entities\EventType;
use Modules\Events\Entities\EventVenue;

class Events extends Component
{
    use WithPagination, WithFileUploads, WithModal;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $selectedId;
    public $name, $description, $image, $start_at, $end_at;
    public $event_status_id, $event_venue_id, $event_type_id, $servicepersonNumber, $unitId;
    public $statuses, $venues, $types, $servicepeople, $units;
    public $filterByStatus, $filterByVenue, $filterByType;

    public $updateMode = false;
    public $title = 'Event';

    protected $listeners = ['event' => 'destroy'];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|sometimes',
        'event_type_id' => 'required',
        'event_status_id' => 'required',
        'event_venue_id' => 'required',
        'start_at' => 'required',
        'end_at' => 'required',
    ];

    protected $messages = [

    ];


    public function mount()
    {
        $this->statuses = EventStatus::all('id', 'name');
        $this->venues = EventVenue::all('id', 'name');
        $this->types = EventType::all('id', 'name');
        $this->servicepeople = Serviceperson::all();
        $this->units = Company::all();
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';

        return view('events::livewire.events', [
            'data' => Event::query()->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->description = null;
        $this->image = null;
        $this->typeId = null;
        $this->statusId = null;
        $this->venueId = null;
        $this->selectedId = null;
        $this->startAt = null;
        $this->endAt = null;

    }

    public function store()
    {
        $validatedData = $this->validate();

        Event::create($validatedData);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Event::findOrFail($id);

        $this->selectedId = $id;

        $this->name = $record->name;
        $this->description = $record->description;
        $this->image = $record->image;
        $this->typeId = $record->event_type_id;
        $this->statusId = $record->event_status_id;
        $this->venueId = $record->event_venue_id;
        $this->startAt = $record->start_at;
        $this->endAt = $record->end_at;
        $this->eventOrganiser = $record->eventOrganiser->name;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'sometimes',
        ], [
            'name.required' => 'Job class is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = Event::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Event::where('id', $id);
            $record->delete();
        }
    }
}
