{{--Job title--}}
<div class="col-3" wire:ignore>
    <select wire:model="jobTitleId" class="form-control mb-2 mr-sm-2 @error('jobTitleId') is-invalid @enderror">
        <option {{$jobTitleId == '' ? 'selected' : ''}} value="">Select Job Title</option>
        @foreach ($jobTitles as $jobTitle)
            <option {{$jobTitleId == $jobTitle->id ? 'selected' : ''}} value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
        @endforeach
    </select>
    @error('jobTitleId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Job class--}}
<div class="col-3"  wire:ignore>
    <select wire:model="classId" class="form-control mb-2 mr-sm-2 @error('classId') is-invalid @enderror">
        <option {{$classId == '' ? 'selected' : ''}} value="">Select Job Class</option>
        @foreach ($classes as $class)
            <option {{$classId == $class->id ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
        @endforeach
    </select>
    @error('classId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Substantive Rank--}}
<div class="col-3"  wire:ignore>
    <select wire:model="rankId" class="form-control mb-2 mr-sm-2 @error('rankId') is-invalid @enderror">
        <option {{$rankId == '' ? 'selected' : ''}} value="">Select Substantive Rank</option>
        @foreach ($ranks as $rank)
            <option {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
        @endforeach
    </select>
    @error('rankId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Career Path--}}
<div class="col-3"  wire:ignore>
    <select wire:model="careerPathId" class="form-control mb-2 mr-sm-2 @error('careerPathId') is-invalid @enderror">
        <option value="">Select Career Path</option>
        @foreach ($careerPaths as $careerPath)
            <option {{$careerPathId == $careerPath->id ? 'selected' : ''}} value="{{$careerPath->id}}">{{$careerPath->name}}</option>
        @endforeach
    </select>
    @error('careerPathId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Establishment --}}
<div class="col-2"  wire:ignore>
    <input wire:model="establishment"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Establishment"
    >
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Description--}}
<div class="col-7" wire:ignore>
    <textarea
        wire:model="description"
        class="form-control mb-2 mr-sm-2 @error('description') is-invalid @enderror"
        name="" id=""
        cols="30"
        rows="1"
        placeholder="Short Description..."
    >
    </textarea>
    @error('description')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
