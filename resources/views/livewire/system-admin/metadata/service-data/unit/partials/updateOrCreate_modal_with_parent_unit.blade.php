<x-crud.livewire-crud-modal title="{{$title}}">
    {{--BEGIN Parent Unit---}}
    <label class="block mt-4" wire:ignore>
        <span class="text-gray-700">Select Type</span>
        <select wire:model="parentUnitId" class="input w-full border mt-1" autofocus>
            <option value="">Select Parent Unit</option>
            @foreach ($parentUnits as $parentUnit)
                <option
                    {{$parentUnitId == $parentUnit->id ? 'selected': ''}}
                    value="{{$parentUnit->id}}">{{$parentUnit->slug}}
                </option>
        @endforeach
        </select>
    </label>
    @error('parentUnitId') <span class="text-red-500">{{ $message }}</span>@enderror
    {{--BEGIN Parent Unit--}}

    {{--BEGIN Name--}}
    <label class="block mt-4">
        <span class="text-gray-700">Name</span>
        <input wire:model="name"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Name"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--BEGIN Name--}}

    {{--BEGIN Slug--}}
    <label class="block mt-4">
        <span class="text-gray-700">Short Name</span>
        <input wire:model="slug"
               type="text" class="input w-full border mt-1"
               placeholder="Short Name"
        >
        @error('slug') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--BEGIN Slug--}}
</x-crud.livewire-crud-modal>

