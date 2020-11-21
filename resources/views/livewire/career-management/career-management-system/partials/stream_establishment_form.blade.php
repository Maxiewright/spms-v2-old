<div class="col" wire:ignore>
    <select wire:model="streamId"
            class="form-control custom-select mb-2 mr-sm-2 @error('streamId') is-invalid @enderror"
        {{$updateMode != null ? 'readonly disabled':''}}
    >
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
    <select wire:model="rankId"
            class="form-control custom-select mb-2 mr-sm-2 @error('rankId') is-invalid @enderror"
        {{$updateMode != null ? 'readonly disabled':''}}
    >
        <option {{$rankId == null ? 'selected': ''}} value="">Select Rank</option>
        @foreach ($ranks as $rank)
            <option {{$rankId == $rank->id ? 'selected': ''}} value="{{$rank->id}}">{{$rank->regiment}}</option>
        @endforeach
    </select>
    @error('rankId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col-2">
    <input wire:model="establishment"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('establishment') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Establishment"
    >
    @error('establishment')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
