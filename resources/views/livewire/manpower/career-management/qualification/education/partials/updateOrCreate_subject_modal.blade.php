<x-crud.livewire-crud-modal title="{{$title}}">
    {{--School--}}
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="Institution Name" placeholder="Enter School / Institution Name" />
    </div>
    {{--Education Level--}}
    <div class="mt-3">
        <x-form.input.livewire-select model="" label="" placeholder="" >
            @foreach($educationLevels as $educationLevel)
                <option value="{{$educationLevel->id}}">{{$educationLevel->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
</x-crud.livewire-crud-modal>


