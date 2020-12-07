<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.allergy.type"
                                  placeholder="Select Types"
                                  label="Type" class="sm:col-span-3">
        @foreach($types as $type)
            <option
                value="{{$type->id}}">{{$type->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.allergy.allergy"
                                  placeholder="{{isset($data['allergy']['type']) ? 'Select Allergy' : 'Select Type First'}}"
                                  label="Allergy" class="sm:col-span-4">
        @foreach($allergies as $allergy)
            <option
                value="{{$allergy->id}}">{{$allergy->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-textarea model="data.allergy.particulars" label="Particulars"
                                    cols="" rows="1" class="sm:col-span-4" />

    <x-buttons.add-field class="mt-3"/>

</div>
