@unless($selectedServiceperson)
    <div>
        <input wire:model="search" placeholder="Search Servicepeople..." class="form-control">
    </div>
@else
    <div class="d-flex justify-content-between form-control">
        <input type="hidden" wire:model="selectedServicepersonNumber">
        <div class="">{{$selectedServiceperson->name}}</div>
        <i wire:click="$set('selectedServicepersonNumber', null)" class="fa fa-close my-auto"></i>
    </div>
@endunless
@unless($noResults)
    @foreach ($servicepeople as $serviceperson)
        <button
            wire:click="$set('selectedServicepersonNumber', {{$serviceperson->number}})"
            class="btn btn-light btn-block bg-white border-bottom text-left m-0">
            {{$serviceperson->name}}
        </button>
    @endforeach
@else
    <div class="btn btn-light btn-block bg-light text-left border-bottom m-0">
        No Serviceperson Found...
    </div>
@endunless



