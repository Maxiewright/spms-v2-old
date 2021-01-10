<div class="col">
    <select wire:model="typeId" class="form-control custom-select mb-2 mr-sm-2 @error('typeId') is-invalid @enderror">
        <option value="">Select Type</option>
        @foreach($types as $type)
            <option {{$typeId == $type->id ? 'selected': ''}} value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
    </select>
    @error('typeId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}" placeholder="Division or Region Name">
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
