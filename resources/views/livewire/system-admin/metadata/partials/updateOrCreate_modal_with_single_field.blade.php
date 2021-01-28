<x-modal.livewire.dialog title="{{$title}}">
    <div class="mb-3">
        <label>Name</label>
        <input
            wire:model="name"
            wire:keydown.enter="store"
            type="text"
            class="input w-full border mt-2"
            placeholder="Enter Name"
            autofocus
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </div>
</x-modal.livewire.dialog>
