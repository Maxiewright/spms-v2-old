<div class="col" wire:ignore>
    <select wire:model="schoolTypeId" class="form-control custom-select mb-2 mr-sm-2 @error('schoolTypeId') is-invalid @enderror">
        <option {{$schoolTypeId == '' ? 'selected' : ''}}>Select Type</option>
        @foreach($schoolTypes as $schoolType)
            <option {{$schoolTypeId == $schoolType->id ? 'selected': ''}} value="{{$schoolType->id}}">{{$schoolType->name}}</option>
        @endforeach
    </select>
    @error('schoolTypeId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col" wire:ignore>
    <select wire:model="schoolDistrictId" class="form-control custom-select mb-2 mr-sm-2 @error('schoolDistrictId') is-invalid @enderror">
        <option {{$schoolDistrictId == '' ? 'selected': ''}} value="">Select District</option>
        @foreach($schoolDistricts as $schoolDistrict)
            <option {{$schoolDistrictId == $schoolDistrict->id ? 'selected': ''}} value="{{$schoolDistrict->id}}">{{$schoolDistrict->name}}</option>
        @endforeach
    </select>
    @error('schoolDistrictId')
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
    <textarea wire:model="description" class="form-control mb-2 mr-sm-2 @error('description') is-invalid @enderror" cols="40" rows="1" title="{{$title}}"  placeholder="Short Description">

    </textarea>
    @error('description')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
