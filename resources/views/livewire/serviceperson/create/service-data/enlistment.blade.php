<div>
    @foreach ($inputs as $input)
        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
            <x-form.input.livewire-select model="data.enlistment.{{$loop->index}}.enlistment_type_id"
                                          placeholder="Select Type"
                                          label="Type" class="sm:col-span-4">
                @foreach($types as $type)
                    <option
                        value="{{$type->id}}">{{$type->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.enlistment.{{$loop->index}}.engagement_period_id"
                                          placeholder="Select Period"
                                          label="Engagement Period" class="sm:col-span-4">
                @foreach($periods as $period)
                    <option
                        value="{{$period->id}}">{{$period->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-date model="data.enlistment.{{$loop->index}}.date" label="Date"
                                        placeholder="Enlistment Date" class=" sm:col-span-3"/>

            {{--Add / Remove Btns --}}
            @if ($input > 1)
                <x-buttons.remove-field field="{{$loop->index}}"/>
            @else
                <x-buttons.add-field/>
            @endif
        </div>
    @endforeach
</div>


