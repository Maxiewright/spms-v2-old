<div class="col" wire:ignore>
    <select wire:model="branchId"
            class="form-control custom-select mb-2 mr-sm-2 @error('branchId') is-invalid @enderror"
            {{$updateMode != null ? 'readonly disabled':''}}
    >
        <option {{$branchId == null ? 'selected': ''}} value="">Select Branch</option>
        @foreach ($branches as $branch)
            <option {{$branchId == $branch->id ? 'selected': ''}} value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
    @error('branchId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col" wire:ignore>
    <select wire:model="rankId"
            class="form-control custom-select mb-2 mr-sm-2 @error('rankId') is-invalid @enderror"
        {{$updateMode != null ? 'readonly disabled':''}}
    >
        <option {{$rankId == null ? 'selected': ''}} value="">Select Rank</option>
        @foreach ($ranks as $rank)
            <option {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment}}</option>
        @endforeach
    </select>
    @error('rankId')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col-2">
    <input wire:model="establishment"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('establishment') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Establishment"
    >
    @error('establishment')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

