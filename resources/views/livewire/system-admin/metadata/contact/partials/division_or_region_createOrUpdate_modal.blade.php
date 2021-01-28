<x-modal.livewire.dialog title="{{$title}}">
    {{--BEGIN: Type--}}
    <label class="block mt-4" wire:ignore>
        <span class="text-gray-700">Select Type</span>
        <select wire:model="typeId" class="input w-full border mt-1" autofocus>
            <option value="">Select Type</option>
            @foreach($types as $type)
                <option {{$typeId == $type->id ? 'selected' : ''}}
                        value="{{$type->id}}">{{$type->name}}
                </option>
            @endforeach
        </select>
    </label>
    @error('typeId') <span class="text-red-500">{{ $message }}</span>@enderror
    {{--END: Type--}}

    {{--BEGIN: Name--}}
    <label class="block mt-4">
        <span class="text-gray-700">Name</span>
        <input wire:model="name"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Name"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Name--}}

    {{--BEGIN: Code--}}
    <label class="block mt-4">
        <span class="text-gray-700">Code</span>
        <input wire:model="code"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Code"
        >
        @error('code') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Code--}}
</x-modal.livewire.dialog>
