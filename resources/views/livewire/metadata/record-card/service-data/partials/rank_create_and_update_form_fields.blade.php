{{--Grade--}}
<div class="col-3">
    <input wire:model="grade"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('grade') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Grade"
    >
    @error('grade')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Regiment Rank--}}
<div class="col-3">
    <input wire:model="regiment"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('regiment') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Regiment Rank"
    >
    @error('regiment')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Regiment Rank Slug--}}
<div class="col-3">
    <input wire:model="regimentSlug"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('regimentSlug') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Regiment Rank Abbreviation"
    >
    @error('regimentSlug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Coast Guard--}}
<div class="col-3">
    <input wire:model="coastGuard"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('coastGuard') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Coast Guard Rank"
    >
    @error('coastGuard')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Coast Guard Rank Slug--}}
<div class="col-3">
    <input wire:model="coastGuardSlug"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('coastGuardSlug') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Coast Guard Rank Abbreviation"
    >
    @error('coastGuardSlug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Air Guard Rank --}}
<div class="col-3">
    <input wire:model="airGuard"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('airGuard') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Air Guard Rank"
    >
    @error('airGuard')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
{{--Air Guard Rank Slug --}}
<div class="col-3">
    <input wire:model="airGuardSlug"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('airGuardSlug') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Air Guard Rank Abbreviation"
    >
    @error('airGuardSlug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
