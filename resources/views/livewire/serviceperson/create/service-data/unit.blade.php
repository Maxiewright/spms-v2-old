<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.unit.battalion" placeholder="Select Battalion"
                                  label="Battalion" class="sm:col-span-3">
        @foreach($battalions as $battalion)
            <option
                value="{{$battalion->id}}">{{$battalion->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.unit.company"
                                  placeholder="{{isset($data['unit']['battalion']) ? 'Select Company' : 'Select Battalion First'}}"
                                  label="Company" class="sm:col-span-3">
        @foreach($companies as $company)
            <option
                value="{{$company->id}}">{{$company->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.unit.platoon"
                                  placeholder="{{isset($data['unit']['company']) ? 'Select Platoon' : 'Select Company First'}} "
                                  label="Platoon" class="sm:col-span-2">
        @foreach($platoons as $platoon)
            <option
                value="{{$platoon->id}}">{{$platoon->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.unit.section"
                                  placeholder="Select Section"
                                  label="Section" class="sm:col-span-2">
        @foreach($sections as $section)
            <option
                value="{{$section->id}}">{{$section->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.unit.date_joined" label="Start Date"
                                placeholder="Date Joined" class=" sm:col-span-2"/>
</div>
