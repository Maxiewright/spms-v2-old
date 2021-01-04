<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.enlistment.0.enlistment_type_id"
                                  placeholder="Select Type"
                                  label="Type" class="sm:col-span-6">
        @foreach($types as $type)
            <option
                value="{{$type->id}}">{{$type->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.enlistment.0.engagement_period_id"
                                  placeholder="Select Period"
                                  label="Engagement Period" class="sm:col-span-6">
        @foreach($periods as $period)
            <option
                value="{{$period->id}}">{{$period->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.enlistment.0.date" label="Date"
                                placeholder="Enlistment Date" class=" sm:col-span-6"/>
</div>
