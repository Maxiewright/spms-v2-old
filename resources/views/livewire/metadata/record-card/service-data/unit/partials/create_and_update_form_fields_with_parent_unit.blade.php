<div class="col">
    <select class="form-control custom-select mb-2 mr-sm-2" wire:model="parentUnitId">
        <option value="">Select Parent Unit</option>
        @foreach ($parentUnits as $parentUnit)
            <option
                {{$parentUnitId == $parentUnit->id ? 'selected': ''}}
                value="{{$parentUnit->id}}">{{$parentUnit->slug}}
            </option>
        @endforeach
    </select>
</div>
<div class="col">
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
