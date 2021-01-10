<x-crud.livewire-crud-modal title="{{$title}}">
    <div class="col" wire:ignore>
        <select wire:model="branchId" class="form-control custom-select mb-2 mr-sm-2 @error('branchId') is-invalid @enderror">
            <option {{$branchId == null ? 'selected': ''}} value="">Select Branch</option>
            @foreach ($branches as $branch)
                <option {{$branchId == $branch->id ? 'selected': ''}} value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach
        </select>
        @error('branchId')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col">
        <input wire:model="name"
               type="text"
               class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror"
               title="{{$title}}"
               placeholder="Name"
        >
        @error('name')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col">
        <input wire:model="slug"
               type="text"
               class="form-control mb-2 mr-sm-2 @error('slug') is-invalid @enderror"
               title="{{$title}}"
               placeholder="Short Name"
        >
        @error('slug')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</x-crud.livewire-crud-modal>

