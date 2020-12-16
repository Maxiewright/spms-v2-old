{{--Nested Grid--}}
<div class="col-span-12 grid grid-cols-12 gap-4 row-gap-5 ">
    <div class="intro-y col-span-12 sm:col-span-4">
        <x-form.input.livewire-text model="data.emergency_contact.first_name" placeholder="First Name" label="First Name"/>
    </div>
    <div class="intro-y col-span-12 sm:col-span-4">
        <x-form.input.livewire-text model="data.emergency_contact.last_name" placeholder="Last Name" label="Last Name"/>
    </div>
    <div class="intro-y col-span-12 sm:col-span-4">
        <x-form.input.livewire-text model="data.emergency_contact.other_names" placeholder="Other Names" label="Other Names"/>
    </div>

    <div class="intro-y col-span-12 sm:col-span-4" wire:ignore>
        <x-form.input.livewire-select model="data.emergency_contact.gender" placeholder="Select Gender"
                                      label="Gender">
            @foreach($genders as $gender)
                <option {{isset($data['emergency_contact']['gender']) == $gender->id ? 'selected' : ''}}
                        value="{{$gender->id}}">{{$gender->name}}
                </option>
            @endforeach
        </x-form.input.livewire-select>
    </div>

    <div class="intro-y col-span-12 sm:col-span-4" wire:ignore>
        <x-form.input.livewire-select model="data.emergency_contact.relationship" placeholder="Select Relationship"
                                      label="Relationship">
            @foreach($relationships as $relationship)
                <option {{isset($data['emergency_contact']['relationship']) == $relationship->id ? 'selected' : ''}}
                        value="{{$relationship->id}}">{{$relationship->name}}
                </option>
            @endforeach
        </x-form.input.livewire-select>
    </div>

    <div class="intro-y col-span-12 sm:col-span-4">
        <x-form.input.livewire-text model="data.emergency_contact.employer" placeholder="Employer Names" label="Employer Names"/>
    </div>
</div>
