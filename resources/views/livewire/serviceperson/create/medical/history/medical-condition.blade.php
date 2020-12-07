<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.medical_condition.medical_condition"
                                  placeholder="Select Medical Condition"
                                  label="Medical Condition" class="sm:col-span-4">
        @foreach($medicalConditions as $medicalCondition)
            <option
                value="{{$medicalCondition->id}}">{{$medicalCondition->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-textarea model="data.medical_condition.particulars" label="Particulars"
                                    cols="40" rows="1" class="sm:col-span-6" />

    <x-buttons.add-field class="mt-3"/>

</div>
