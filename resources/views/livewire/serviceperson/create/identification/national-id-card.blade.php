<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-text model="data.national_id.number" label="National ID"
                                placeholder="National ID Card Number *" class="sm:col-span-6"/>

    <x-form.input.livewire-date model="data.national_id.date_of_birth"
                                label="Date of Birth" placeholder="Date of Birth"
                                class="sm:col-span-6"/>

    <x-form.input.livewire-select model="data.national_id.place_of_birth_division"
                                  placeholder="Select Division or Region" label="Division or Region"
                                  class="sm:col-span-6">
        @foreach($divisions as $division)
            <option
                value="{{$division->id}}">{{$division->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.national_id.place_of_birth"
                                  placeholder="{{isset($data['national_id']['place_of_birth_division']) ? 'Select City or Town' : 'Select Division or Region First'}}"
                                  label="Place of Birth" class="mb-3 sm:col-span-6">
        @foreach($cities as $city)
            <option
                value="{{$city->id}}">{{$city->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.national_id.gender_id" placeholder="Select Gender"
                                  label="Gender" class="mb-3 sm:col-span-4">
        @foreach($genders as $gender)
            <option
                value="{{$gender->id}}">{{$gender->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.national_id.issued_on" label="Issue Date"
                                placeholder="Date Issued" class="mb-3 sm:col-span-4"/>
    <x-form.input.livewire-date model="data.national_id.expired_on" label="Expiry Date"
                                placeholder="Expiry Date" class="mb-3 sm:col-span-4"/>
</div>


