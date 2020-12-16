{{--Nested Grid--}}
<div class="col-span-12 grid grid-cols-12 gap-4 row-gap-5 ">
    <div class="intro-y col-span-12 sm:col-span-6">
        <x-form.input.livewire-text model="data.emergency_contact_address.address1" placeholder="Address Line 1" label="Address 1"/>
    </div>
    <div class="intro-y col-span-12 sm:col-span-6">
        <x-form.input.livewire-text model="data.emergency_contact_address.address2" placeholder="Address Line 2" label="Address 2"/>
    </div>
    {{--BEGIN: Division or Region--}}
    <div class="intro-y col-span-12 sm:col-span-6" wire:ignore>
        <x-form.input.livewire-select model="data.emergency_contact_address.division" placeholder="Select Division or Region"
                                      label="Division or Region">
            @foreach($divisions as $division)
                <option {{isset($data['emergency_contact_address']['division']) == $division->id ? 'selected' : ''}}
                        value="{{$division->id}}">{{$division->name}}
                </option>
            @endforeach
        </x-form.input.livewire-select>

    </div>
    {{--END: Division or Region--}}
    {{--BEGIN: City or Town--}}
    <div class="intro-y col-span-12 sm:col-span-6" wire:key="city">
        <x-form.input.livewire-select
            model="data.emergency_contact_address.city"
            placeholder="{{isset($data['emergency_contact_address']['division']) ? 'Select City or Town' : 'Select Division or Region First'}}"
            label="City or Town"
        >
            @foreach($cities as $city)
                <option {{isset($data['emergency_contact_address']['city']) == $city->id ? 'selected' : ''}}
                        value="{{$city->id}}">{{$city->name}}
                </option>
            @endforeach
        </x-form.input.livewire-select>
        {{--END: City or Town--}}
    </div>
</div>
