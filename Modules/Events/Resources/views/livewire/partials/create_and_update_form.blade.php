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
<div class="col-2" wire:ignore>
    <input wire:model="name"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Name"
    >
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{--Description--}}
<div class="col-2" wire:ignore>
    <textarea wire:model="description"
              class="form-control mb-2 mr-sm-2 @error('description') is-invalid @enderror"
              title="{{$title}}"
              placeholder="Description"
    ></textarea>
    @error('description')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{--Start Date--}}
<div class="col-2" wire:ignore>
    <input wire:model="startAt"
           type="date"
           class="form-control mb-2 mr-sm-2 @error('startAt') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Start Date"
    >
    @error('startAt')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{--End Date--}}
<div class="col-2" wire:ignore>
    <input wire:model="startAt"
           type="date"
           class="form-control mb-2 mr-sm-2 @error('endAt') is-invalid @enderror"
           title="{{$title}}"
           placeholder="End Date"
    >
    @error('endAt')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{-- Type --}}
<div class="col-3" wire:ignore>
    <select wire:model="typeId" class="form-control mb-2 mr-sm-2 @error('typeId') is-invalid @enderror">
        <option {{$typeId == '' ? 'selected' : ''}} value="">Select Type</option>
        @foreach ($types as $type)
            <option {{$typeId == $type->id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
    </select>
    @error('typeId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{-- Type --}}
<div class="col-3" wire:ignore>
    <select wire:model="venueId" class="form-control mb-2 mr-sm-2 @error('venueId') is-invalid @enderror">
        <option {{$venueId == '' ? 'selected' : ''}} value="">Select Venue</option>
        @foreach ($venues as $venue)
            <option {{$venueId == $venue->id ? 'selected' : ''}} value="{{$venue->id}}">{{$venue->name}}</option>
        @endforeach
    </select>
    @error('venueId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{-- Status --}}
<div class="col-3" wire:ignore>
    <select wire:model="statusId" class="form-control mb-2 mr-sm-2 @error('statusId') is-invalid @enderror">
        <option {{$statusId == '' ? 'selected' : ''}} value="">Select Status</option>
        @foreach ($statuses as $status)
            <option {{$statusId == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
        @endforeach
    </select>
    @error('statusId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

{{-- Serviceperson Organiser --}}
<div class="col-3" wire:ignore>
    <select wire:model="statusId" class="form-control mb-2 mr-sm-2 @error('statusId') is-invalid @enderror">
        <option {{$statusId == '' ? 'selected' : ''}} value="">Select Status</option>
        @foreach ($statuses as $status)
            <option {{$statusId == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
        @endforeach
    </select>
    @error('statusId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

</x-crud.livewire-crud-modal>
