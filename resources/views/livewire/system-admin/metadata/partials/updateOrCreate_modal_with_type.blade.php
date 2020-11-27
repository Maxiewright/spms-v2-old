<x-crud.livewire-crud-modal title="{{$title}}">
    <label class="block mt-4" wire:ignore>
        <span class="text-gray-700">Select Type</span>
        <select wire:model="typeId" class="input w-full border mt-1" autofocus>
            <option value="">Select Type</option>
            @foreach($types as $type)
                <option {{$typeId == $type->id ? 'selected': ''}}
                        value="{{$type->id}}">{{$type->name}}
                </option>
            @endforeach
        </select>
        @error('typeId') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>

    <label class="block mt-4">
        <span class="text-gray-700">Name</span>
        <input wire:model="name"
            type="text" class="input w-full border mt-1"
            placeholder="Enter Name"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
</x-crud.livewire-crud-modal>
