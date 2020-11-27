<x-crud.livewire-crud-modal title="{{$title}}">
    {{--BEGIN: Division or Region--}}
    <label class="block mt-4" wire:ignore>
        <span class="text-gray-700">Division or Region</span>
        <select wire:model="divisionOrRegionId" class="input w-full border mt-1" autofocus>
            <option value="">Select Division or Region</option>
            @foreach($divisionOrRegions as $divisionOrRegion)
                <option {{$divisionOrRegionId == $divisionOrRegion->id ? 'selected': '' }} value="{{$divisionOrRegion->id}}">{{$divisionOrRegion->name}}</option>
            @endforeach
        </select>
    </label>
    @error('typeId') <span class="text-red-500">{{ $message }}</span>@enderror
    {{--END: Division or Region--}}

    {{--BEGIN: City Or Town Name--}}
    <label class="block mt-4">
        <span class="text-gray-700">City Or Town Name</span>
        <input wire:model="name"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Name"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: City Or Town Name--}}

</x-crud.livewire-crud-modal>
