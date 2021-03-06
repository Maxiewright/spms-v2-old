<div>
    @foreach ($inputs as $input)
        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
            <x-form.input.livewire-select model="data.unit.{{$loop->index}}.battalion_id" placeholder="Select Battalion"
                                          label="Battalion" class="sm:col-span-4">
                @foreach($battalions as $battalion)
                    <option
                        value="{{$battalion->id}}">{{$battalion->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.unit.{{$loop->index}}.company_id"
                                          placeholder="{{isset($data['unit']['battalion_id']) ? 'Select Company' : 'Select Battalion First'}}"
                                          label="Company" class="sm:col-span-4">
                @foreach($companies as $company)
                    <option
                        value="{{$company->id}}">{{$company->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.unit.{{$loop->index}}.platoon_id"
                                          placeholder="{{isset($data['unit']['company_id']) ? 'Select Platoon' : 'Select Company First'}} "
                                          label="Platoon" class="sm:col-span-4">
                @foreach($platoons as $platoon)
                    <option
                        value="{{$platoon->id}}">{{$platoon->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.unit.{{$loop->index}}.section_id"
                                          placeholder="Select Section"
                                          label="Section" class="sm:col-span-4">
                @foreach($sections as $section)
                    <option
                        value="{{$section->id}}">{{$section->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-date model="data.unit.{{$loop->index}}.joined_on" label="Date Joined"
                                        placeholder="Date Joined" class=" sm:col-span-2"/>

            <x-form.input.livewire-date model="data.unit.{{$loop->index}}.left_on" label="Date Left"
                                        placeholder="Date Left" class=" sm:col-span-2"/>


            {{--Add / Remove Btns --}}
            @if ($input > 1)
                <x-buttons.remove-field field="{{$loop->index}}"/>
            @else
                <x-buttons.add-field />
            @endif
        </div>
    @endforeach
</div>



