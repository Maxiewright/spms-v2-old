<?php

namespace App\Http\Livewire\Manpower\CareerManagement\CareerManagementSystem;

use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\StreamEstablishment;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class StreamEstablishmentComponent extends Component
{
    use  WithPagination, WithModal;


    public $search = '', $filterStream = '', $filterRank = '';
    public $updateMode, $ranks, $rankId, $streams, $streamId, $establishment, $selectedId;
    public $title='Stream Establishment';

    protected $listeners = ['stream_establishment' => 'destroy'];

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
        $this->rankId = null;
        $this->streamId = null;
        $this->establishment = null;
    }
    public function store()
    {
        $this->performValidation();



        StreamEstablishment::create([
            'rank_id' => $this->rankId,
            'stream_id' => $this->streamId,
            'establishment' => $this->establishment,
        ]);

        $this->resetInput();
    }
    public function edit($stream_id, $rank_id)
    {
        $record = StreamEstablishment::where(function($query) use($stream_id, $rank_id){
            $query->where('stream_id', '=', $stream_id)
                ->where('rank_id', '=', $rank_id);
        })->first();

        $this->rankId = $record->rank_id;
        $this->streamId = $record->stream_id;
        $this->establishment = $record->establishment;

        $this->updateMode = true;
    }


    public function update()
    {

        $this->validate([
            'establishment' => 'required|numeric'
        ],[
            'establishment.required' => 'An established strength is required',
            'establishment.numeric' => 'Establishment must be a number'
        ]);

        if ($this->rankId && $this->streamId) {
            $record = StreamEstablishment::where(function($query){
                $query->where('stream_id', '=', $this->streamId)
                    ->where('rank_id', '=', $this->rankId);
            });

//            dd($record);
            $record->update([
                'rank_id' => $this->rankId,
                'stream_id' => $this->streamId,
                'establishment' => $this->establishment,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($stream_id, $rank_id)
    {
        if ($rank_id && $stream_id) {
            $record = StreamEstablishment::where(function($query) use($stream_id, $rank_id){
                $query->where('stream_id', '=', $stream_id)
                    ->where('rank_id', '=', $rank_id);
            });

            $record->delete();
        }
    }

    private function performValidation()
    {
        $this->validate([
            'rankId' => [ 'required',
                Rule::unique('stream_establishment', 'rank_id')->where(function ($q){
                    return $q->where('stream_id', $this->streamId);
                })],

            'streamId' => [ 'required',
                Rule::unique('stream_establishment', 'stream_id')->where(function ($q){
                    return $q->where('rank_id', $this->rankId);
                })],

            'establishment' => 'required|numeric'
        ],[
            'randId.required' => 'Rank is required',
            'rankId.unique' => 'This combination of rank and stream already exist',
            'streamId.required' => 'Branch is Required',
            'streamId.unique' => 'This combination of stream and rank already exist',
            'establishment.required' => 'An established strength is required',
            'establishment.numeric' => 'Establishment must be a number'
        ]);
    }
}
