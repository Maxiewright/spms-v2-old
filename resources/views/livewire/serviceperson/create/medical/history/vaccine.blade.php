<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.vaccine.vaccine"
                                  placeholder="Select Vaccine"
                                  label="Vaccine" class="sm:col-span-4">
        @foreach($vaccines as $vaccine)
            <option
                value="{{$vaccine->id}}">{{$vaccine->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.vaccine.received_on" label="Date Received"
                                placeholder="Date Received" class=" sm:col-span-3"/>

    <x-form.input.livewire-text model="data.vaccine.place_received" label="Place Received"
                                placeholder="Place Received" class=" sm:col-span-4"/>

    <x-buttons.add-field class="mt-3"/>
</div>
