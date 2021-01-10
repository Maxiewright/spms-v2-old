{{--School--}}
<div class="col">
    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}" placeholder="Institution Name">
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Education Level--}}
<div class="col" wire:ignore>
    <select wire:model="educationLevelId" class="form-control custom-select mb-2 mr-sm-2 @error('educationLevelId') is-invalid @enderror">
        <option {{$educationLevelId == '' ? 'selected' : ''}}>Select Education Level</option>
        @foreach($educationLevels as $educationLevel)
            <option {{$educationLevelId == $educationLevel->id ? 'selected': ''}} value="{{$educationLevel->id}}">{{$educationLevel->name}}</option>
        @endforeach
    </select>
    @error('educationLevelId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
