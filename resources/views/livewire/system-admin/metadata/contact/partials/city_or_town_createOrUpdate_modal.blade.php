<x-crud.livewire-crud-modal title="{{$title}}">
    {{-- Division or Region--}}
    <div>
        <x-form.input.livewire-select model="divisionOrRegionId" label="Division or Region" placeholder="Select Division or Region">
            @foreach($divisionOrRegions as $divisionOrRegion)
                <option value="{{$divisionOrRegion->id}}">{{$divisionOrRegion->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>

    {{-- City or Town Name --}}
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="City or Town Name" placeholder="Enter City or Town Name" />
    </div>
</x-crud.livewire-crud-modal>
