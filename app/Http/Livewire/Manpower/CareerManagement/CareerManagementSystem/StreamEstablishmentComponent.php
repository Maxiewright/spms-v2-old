<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\StreamEstablishment;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class StreamEstablishmentComponent extends Component
{
    use  WithPagination, WithModal, WithAlerts, WithDataTable;


    public $search = '', $filterStream = '', $filterRank = '';
    public $ranks, $rank_id, $streams, $stream_id, $establishment, $selectedId;
    public $title='Stream Establishment';

    protected $listeners = ['destroyStreamEstablishment'];

    //Rules defined in store method

    protected $messages = [
        'randId.required' => 'Rank is required',
        'rank_id.unique' => 'This combination of rank and stream already exist',
        'stream_id.required' => 'Branch is Required',
        'stream_id.unique' => 'This combination of stream and rank already exist',
        'establishment.required' => 'An established strength is required',
        'establishment.numeric' => 'Establishment must be a number'
    ];

    public function mount()
    {
        $this->ranks = Rank::select('id', 'regiment')
            ->where(function ($query){
                $query->where('id', '<=', 8)
                    ->where('id', '>', 1);
            })->get();

        $this->streams = Stream::all('id', 'name');

    }

    public function render()
    {
        $searchTerm = '%'  .$this->search . '%';

        return view('livewire.manpower.career-management.career-management-system.stream-establishment-component',[
            'data' => StreamEstablishment::query()
                ->with('stream', 'rank')
                ->orderBy('created_at', 'DESC')
                ->where(function ($query) use($searchTerm){
                    $query->whereHas('stream', function ($query) use($searchTerm){
                        $query->where('name', 'like', $searchTerm)
                            ->orwhere('slug', 'like', $searchTerm);
                    })
                        ->orWhereHas('rank', function ($query) use($searchTerm){
                            $query->where('regiment', 'like', $searchTerm)
                                ->orWhere('regiment_slug', 'like', $searchTerm);
                        });
                })
                ->when($this->filterStream, function ($query){
                    $query->where('stream_id', '=',$this->filterStream);
                })
                ->when($this->filterRank, function ($query){
                    $query->where('rank_id', '=',$this->filterRank);
                })
                ->paginate(10)
        ]);
    }

    private function resetInput()
    {
        $this->rank_id = null;
        $this->stream_id = null;
        $this->establishment = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'rank_id' => [ 'required',
                Rule::unique('stream_establishment', 'rank_id')->where(function ($q){
                    return $q->where('stream_id', $this->stream_id);
                })->ignore($this->selectedId)
            ],

            'stream_id' => [ 'required',
                Rule::unique('stream_establishment', 'stream_id')->where(function ($q){
                    return $q->where('rank_id', $this->rank_id);
                })->ignore($this->selectedId)
            ],

            'establishment' => 'required|numeric'
        ]);


        StreamEstablishment::updateOrCreate(['id' => $this->selectedId], $validatedData);

        $this->showSuccessAlert();

        $this->resetInput();

        $this->closeModal();

    }

    public function edit($id)
    {
        $record = StreamEstablishment::findOrFail($id);

        $this->selectedId = $id;
        $this->rank_id = $record->rank_id;
        $this->stream_id = $record->stream_id;
        $this->establishment = $record->establishment;

        $this->openModal();
    }

    public function destroy($id)
    {
        if ($id) {

            $record = StreamEstablishment::where('id', $id);

            $record->delete();
        }
    }


}
