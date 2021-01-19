<x-crud.livewire-crud-modal title="{{$title}}">
    <div class="">
        <x-form.input.livewire-select model="career_path_id" label="Career Path" placeholder="Select Career Path">
            @foreach ($careerPaths as $careerPath)
                <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="Name" placeholder="Enter Name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="slug" label="Short Name" placeholder="Enter Short Name" />
    </div>
</x-crud.livewire-crud-modal>

