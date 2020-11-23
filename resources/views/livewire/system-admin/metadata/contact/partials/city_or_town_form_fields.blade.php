<div class="col" wire:ignore>
    <select wire:model="divisionOrRegionId" class="form-control custom-select mb-2 mr-sm-2 @error('divisionOrRegionId') is-invalid @enderror">
        <option value="">Select Division or Region</option>
        @foreach($divisionOrRegions as $divisionOrRegion)
            <option {{$divisionOrRegionId == $divisionOrRegion->id ? 'selected': '' }} value="{{$divisionOrRegion->id}}">{{$divisionOrRegion->name}}</option>
        @endforeach
    </select>
    @error('divisionOrRegionId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}">
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
