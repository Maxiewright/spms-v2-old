<div>
    <div class="">
        <div class="mb-2 bg-light">
            @unless($selectedServiceperson)
                <input wire:model="search" placeholder="Search Servicepeople..." class="form-control">
            @else
                <div class="d-flex justify-content-between form-control">
                    <div class="">{{$selectedServiceperson->name}}</div>
                    <i wire:click="$set('selectedServicepersonNumber', null)" class="fa fa-close my-auto"></i></div>
        </div>
        @endunless
    </div>
    <div class="">
        @unless($noResults)
            @foreach ($servicepeople as $serviceperson)
                <button
                    wire:click="$set('selectedServicepersonNumber', {{$serviceperson->number}})"
                    class="btn btn-light btn-block bg-light text-left border-bottom m-1">
                    {{$serviceperson->name}}
                </button>
            @endforeach
        @else
            <div class="btn btn-light btn-block bg-light text-left border-bottom m-1">
                No Serviceperson Found...
            </div>
        @endunless
    </div>
</div>
