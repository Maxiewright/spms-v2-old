<x-modal.livewire.dialog title="{{$title}}">
    <div class="">
        <x-form.input.livewire-select model="courseTypeId" label="Course Type" placeholder="Select Course Type" >
            @foreach($courseTypes as $courseType)
                <option {{$courseTypeId == $courseType->id ? 'selected': ''}} value="{{$courseType->id}}">{{$courseType->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="Institution Name" placeholder="Enter Institution Name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="slug" label="Institution Short Name" placeholder="Enter Short Name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-textarea model="description" label="Description" rows="1" cols="60" />
    </div>
</x-modal.livewire.dialog>


