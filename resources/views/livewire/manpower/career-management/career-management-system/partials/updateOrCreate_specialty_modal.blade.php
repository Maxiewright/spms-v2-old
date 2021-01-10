<x-crud.livewire-crud-modal title="{{$title}}">
    <div class="col" wire:ignore>
        <select wire:model="careerPathId" class="form-control custom-select mb-2 mr-sm-2 @error('careerPathId') is-invalid @enderror">
            <option {{$careerPathId == null ? 'selected': ''}} value="">Select Career Path</option>
            @foreach ($careerPaths as $careerPath)
                <option {{$careerPathId == $careerPath->id ? 'selected': ''}} value="{{$careerPath->id}}">{{$careerPath->name}}</option>
            @endforeach
        </select>
        @error('careerPathId')
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

