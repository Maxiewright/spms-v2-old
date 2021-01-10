<x-crud.livewire-crud-modal title="{{$title}}">
    <div>
        @if ($image)
            Photo Preview:
            <img src="{{ $image->temporaryUrl() }}" height="100">
        @endif
        <input type="file" wire:model="image">
        @error('image')
        <div class="invalid-feedback">{{$message}}</div> @enderror
    </div>


    {{--Name--}}
    <label class="block mt-4">
        <span class="text-gray-700">Name</span>
        <input wire:model="name"
               type="text" class="input w-full border mt-1"
               placeholder="Enter Name"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>


    {{--Description--}}
    <label class="block mt-4">
        <span class="text-gray-700">Description</span>
        <input wire:model="description"
               type="text" class="input w-full border mt-1"
               placeholder="Description"
        >
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>

    {{--Start Date--}}
    <label class="block mt-4">
        <span class="text-gray-700">Start Date</span>
        <input wire:model="start_at"
               type="date" class="input w-full border mt-1"
               placeholder="Start Date"
        >
        @error('startAt') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>


    {{--End Date--}}
    <label class="block mt-4">
        <span class="text-gray-700">End Date</span>
        <input wire:model="end_at"
               type="date" class="input w-full border mt-1"
               placeholder="End Date"
        >
        @error('endAt') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>

    {{-- Type --}}
    <label class="block mt-4">
        <span class="text-gray-700"> </span>
        <select wire:model="event_type_id" class="input w-full border mt-1" autofocus>
            <option value="">Select Type</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
    </label>
    @error('typeId') <span class="text-red-500">{{ $message }}</span>@enderror



    {{-- Venue --}}
    <label class="block mt-4">
        <span class="text-gray-700"> </span>
        <select wire:model="event_venue_id" class="input w-full border mt-1" autofocus>
            <option  value="">Select Venue</option>
            @foreach ($venues as $venue)
                <option  value="{{$venue->id}}">{{$venue->name}}</option>
            @endforeach
        </select>
    </label>
    @error('venueId') <span class="text-red-500">{{ $message }}</span>@enderror

    {{-- Status --}}
    <label class="block mt-4">
        <span class="text-gray-700"> </span>
        <select wire:model="event_status_id" class="input w-full border mt-1" autofocus>
            <option value="">Select Status</option>
            @foreach ($statuses as $status)
                <option value="{{$status->id}}">{{$status->name}}</option>
            @endforeach
        </select>
    </label>
    @error('statusId') <span class="text-red-500">{{ $message }}</span>@enderror

    {{-- Serviceperson Organiser --}}
    <label class="block mt-4">
        <span class="text-gray-700"> </span>
        <select wire:model="unitId" class="input w-full border mt-1" autofocus>
            <option value="">Select Organiser</option>
            @foreach ($units as $unit)
                <option valu="{{$unit->id}}">{{$unit->slug}}</option>
            @endforeach
        </select>
    </label>
    @error('unitId') <span class="text-red-500">{{ $message }}</span>@enderror
</x-crud.livewire-crud-modal>
