<x-crud.livewire-crud-modal title="{{$title}}">

    {{--BEGIN: Grade--}}
    <label class="block mt-4">
        <span class="text-gray-700">Name</span>
        <input wire:model="grade"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Name"
        >
        @error('grade') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Grade--}}

    {{--BEGIN: Regiment--}}
    <label class="block mt-4">
        <span class="text-gray-700">Regiment Rank</span>
        <input wire:model="regiment"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Regiment Rank"
        >
        @error('regiment') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Regiment Rank--}}

    {{--BEGIN: Regiment Rank Abbreviation--}}
    <label class="block mt-4">
        <span class="text-gray-700">Regiment Rank Abbreviation</span>
        <input wire:model="regimentSlug"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Regiment Rank Abbreviation"
        >
        @error('regimentSlug') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Regiment Rank Abbreviation--}}

    {{--BEGIN: Coast Guard--}}
    <label class="block mt-4">
        <span class="text-gray-700">Coast Guard Rank</span>
        <input wire:model="coastGuard"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Coast Guard Rank"
        >
        @error('coastGuard') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Coast Guard--}}

    {{--BEGIN: Coast Guard Rank Abbreviation--}}
    <label class="block mt-4">
        <span class="text-gray-700">Coast Guard Rank Abbreviation</span>
        <input wire:model="coastGuardSlug"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Coast Guard Rank Abbreviation"
        >
        @error('coastGuardSlug') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Coast Guard Rank Abbreviation--}}

    {{--BEGIN: Air Guard--}}
    <label class="block mt-4">
        <span class="text-gray-700">Air Guard Rank</span>
        <input wire:model="airGuard"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Air Guard Rank"
        >
        @error('airGuard') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Air Guard--}}

    {{--BEGIN: Air Guard Rank Abbreviation--}}
    <label class="block mt-4">
        <span class="text-gray-700">Air Guard Rank Abbreviation</span>
        <input wire:model="airGuardSlug"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Air Guard Rank Abbreviation"
        >
        @error('airGuardSlug') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
    {{--END: Air Guard Rank Abbreviation--}}
</x-crud.livewire-crud-modal>


{{--Air Guard Rank --}}
<div class="col-3">
    <input wire:model="airGuard"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('airGuard') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Air Guard Rank"
    >
    @error('airGuard')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Air Guard Rank Slug --}}
<div class="col-3">
    <input wire:model="airGuardSlug"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('airGuardSlug') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Air Guard Rank Abbreviation"
    >
    @error('airGuardSlug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
