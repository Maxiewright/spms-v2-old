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
<div class="col">
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
