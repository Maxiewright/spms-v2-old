<div class="col" wire:ignore>
    <select wire:model="streamId" class="form-control custom-select mb-2 mr-sm-2 @error('streamId') is-invalid @enderror">
        <option {{$streamId == null ? 'selected': ''}} value="">Select Stream</option>
        @foreach ($streams as $stream)
            <option {{$streamId == $stream->id ? 'selected': ''}} value="{{$stream->id}}">{{$stream->name}}</option>
        @endforeach
    </select>
    @error('streamId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col" wire:ignore>
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
<div class="col">
    <input wire:model="slug"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('slug') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Short Name"
    >
    @error('slug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
