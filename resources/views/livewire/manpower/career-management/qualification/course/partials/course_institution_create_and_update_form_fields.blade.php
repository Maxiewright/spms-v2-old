<div class="col" wire:ignore>
    <select wire:model="courseTypeId" class="form-control custom-select mb-2 mr-sm-2 @error('courseTypeId') is-invalid @enderror">
        <option value="">Select Type</option>
        @foreach($courseTypes as $courseType)
            <option {{$courseTypeId == $courseType->id ? 'selected': ''}} value="{{$courseType->id}}">{{$courseType->name}}</option>
        @endforeach
    </select>
    @error('courseTypeId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}" placeholder="Institution Name">
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col">
    <input wire:model="slug" type="text" class="form-control mb-2 mr-sm-2 @error('slug') is-invalid @enderror" title="{{$title}}" placeholder="Short Name">
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
