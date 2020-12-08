<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.hobby.type" placeholder="Select Type"
                                  label="Hobby Type" class=" sm:col-span-4">
        @foreach($types as $type)
            <option
                value="{{$type->id}}">{{$type->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.hobby.hobby" placeholder="{{isset($data['hobby']['type']) ? 'Select Hobby' : 'Select  Type first'}}"
                                  label="Hobby" class="sm:col-span-6">
        @foreach($hobbies as $hobby)
            <option
                value="{{$hobby->id}}">{{$hobby->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-buttons.add-field />
</div>

