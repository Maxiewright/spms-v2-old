<x-crud.livewire-crud-modal title="{{$title}}">
    <div class="">
        <x-form.input.livewire-select model="institutionId" label="Course Institution" placeholder="Select Course Institution" >
            @foreach($institutions as $institution)
                <option value="{{$institution->id}}">{{$institution->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="Course Name" placeholder="Enter Course Name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="slug" label="Course Short Name" placeholder="Enter Short Name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-textarea model="description" label="Description" rows="1" cols="60" />
    </div>
</x-crud.livewire-crud-modal>


