<div class="pr-2" wire:ignore>
    <select wire:model="{{$option}}Id" class="form-control custom-select mb-2 mr-sm-2 @error($option.'Id') is-invalid @enderror">
        <option {{$option.'Id' == '' ? 'selected' : ''}} value="">{{$action}}{{ucfirst($option)}}</option>
        {{$slot}}
    </select>
    @error($option.'Id')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

