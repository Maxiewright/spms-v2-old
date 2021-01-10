<x-crud.livewire-crud-modal title="{{$title}}">
    <div class="col" wire:ignore>
        <select wire:model="careerPathId"
                class="form-control custom-select mb-2 mr-sm-2 @error('careerPathId') is-invalid @enderror"
            {{$updateMode != null ? 'readonly disabled':''}}
        >
            <option {{$careerPathId == null ? 'selected': ''}} value="">Select Career Path</option>
            @foreach ($careerPaths as $careerPath)
                <option {{$careerPathId == $careerPath->id ? 'selected': ''}} value="{{$careerPath->id}}">{{$careerPath->name}}</option>
            @endforeach
        </select>
        @error('careerPathId')
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
                <option {{$rankId == $rank->id ? 'selected': ''}} value="{{$rank->id}}">{{$rank->regiment}}</option>
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
</x-crud.livewire-crud-modal>


