<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.bio_data.eye_colour" placeholder="Select Eye Colour"
                                  label="Eye Colour" class="sm:col-span-12">
        @foreach($eyeColours as $eyeColour)
            <option
                value="{{$eyeColour->id}}">{{$eyeColour->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.bio_data.hair_colour" placeholder="Select Hair Colour"
                                  label="Hair Colour" class="sm:col-span-12">
        @foreach($hairColours as $hairColour)
            <option
                value="{{$hairColour->id}}">{{$hairColour->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>
    <x-form.input.livewire-select model="data.bio_data.skin_colour" placeholder="Select Skin Colour"
                                  label="Skin Colour" class="sm:col-span-12">
        @foreach($skinColours as $skinColour)
            <option
                value="{{$skinColour->id}}">{{$skinColour->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.bio_data.blood_type" placeholder="Select Blood Type"
                                  label="Blood Type" class="sm:col-span-12">
        @foreach($bloodTypes as $bloodType)
            <option
                value="{{$bloodType->id}}">{{$bloodType->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-check-box model="data.bio_data.wears_classes" label="Wears Glasses" class="sm:col-span-6"/>
    <x-form.input.livewire-check-box model="data.bio_data.wears_contacts" label="Wears Contacts" class="sm:col-span-6" />

    <livewire:serviceperson.create.medical.biodata.height :data="$data"/>

    <livewire:serviceperson.create.medical.biodata.weight :data="$data"/>

</div>
