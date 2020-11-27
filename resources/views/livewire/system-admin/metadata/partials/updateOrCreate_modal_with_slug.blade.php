<x-crud.livewire-crud-modal title="{{$title}}">
    <label class="block mt-4">
        <span class="text-gray-700">Name</span>
        <input wire:model="name"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Name"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    <label class="block mt-4">
        <span class="text-gray-700">Short Name</span>
        <input wire:model="slug"
               type="text" class="input w-full border mt-1"
               placeholder="Short Name"
        >
        @error('slug') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
</x-crud.livewire-crud-modal>
