<div class="col" wire:ignore>
    <select wire:model="institutionId" class="form-control custom-select mb-2 mr-sm-2 @error('institutionId') is-invalid @enderror">
        <option {{$institutionId == null ? 'selected': ''}} value="">Select Course Institution</option>
        @foreach($institutions as $institution)
            <option {{$institutionId == $institution->id ? 'selected': ''}} value="{{$institution->id}}">{{$institution->name}}</option>
        @endforeach
    </select>
    @error('institutionId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}" placeholder="Course Name">
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <input wire:model="slug" type="text" class="form-control mb-2 mr-sm-2 @error('slug') is-invalid @enderror" title="{{$title}}" placeholder="Course Short Name">
    @error('slug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <textarea wire:model="description" class="form-control mb-2 mr-sm-2 @error('description') is-invalid @enderror" cols="40" rows="1" title="{{$title}}"  placeholder="Short Description">
    </textarea>
    @error('description')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
