<div class="form-group" wire:ignore>
    <select wire:model="typeId" class="form-control custom-select mb-2 mr-sm-2">
        <option {{$typeId == '' ? 'selected': ''}}  selected value="">Select Type</option>
        @foreach ($types as $type)
            <option {{$typeId == $type->id ? 'selected': ''}} value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}">
    @error('name')
    <div class="invalid-feedback mb-2 mr-sm-2">{{$message}}</div>
    @enderror
</div>
