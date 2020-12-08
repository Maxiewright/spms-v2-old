<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.sport.type" placeholder="Select Type"
                                  label="Sport Type" class=" sm:col-span-4">
        @foreach($types as $type)
            <option
                value="{{$type->id}}">{{$type->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.sport.sport" placeholder="{{isset($data['sport']['type']) ? 'Select Sport' : 'Select  Type first'}}"
                                  label="Sport" class="sm:col-span-6">
        @foreach($sports as $sport)
            <option
                value="{{$sport->id}}">{{$sport->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-buttons.add-field />
</div>
